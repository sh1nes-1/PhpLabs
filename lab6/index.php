<?php 
	require_once "../../../config/lab6_db.php";

	define("FORM_ERROR_MESSAGES", [
		"empty" => "Поле %s не може бути порожнім!",
		"invalid_date" => "Поле %s має бути в правильному форматі (день.місяць.рік)!",
		"invalid_text" => "Поле %s має містити мінімум %d символів і бути в правильному форматі!",
		"already_exists" => "Значення %s вже існує в базі даних!",
		"not_exists" => "Значення %s не існує в базі даних!"
    ]);  
	
	$form_errors = [];	

	// add lecturer form handler
	if (isset($_POST['add-lecturer'], $_POST['pib'], $_POST['birthday'], $_POST['salary'], $_POST['lecturer_faculty'], $_POST['lecturer_degree'], $_POST['lecturer_position'])) {
		$pib = htmlspecialchars($_POST['pib']);		
		$birthday = htmlspecialchars($_POST['birthday']);
		$salary = htmlspecialchars($_POST['salary']);		
		$lecturer_faculty = htmlspecialchars($_POST['lecturer_faculty']);
		$lecturer_degree = htmlspecialchars($_POST['lecturer_degree']);		
		$lecturer_position = htmlspecialchars($_POST['lecturer_position']);

		if (empty($pib)) {			
			$form_errors['pib'] = sprintf(FORM_ERROR_MESSAGES["empty"], "ПІБ");
		} else if (!preg_match("/[A-Za-zА-Яа-яЇїІіЄєҐґ'\\s]{7,}/m", $pib)) {
			$form_errors['pib'] = sprintf(FORM_ERROR_MESSAGES["invalid_text"], "ПІБ", 7);
		}

		if (empty($birthday)) {
			$form_errors['birthday'] = sprintf(FORM_ERROR_MESSAGES["empty"], "Дата народження");
		} else if (!preg_match("/([0-2][0-9]|(3)[0-1])[\/\.](((0)[0-9])|((1)[0-2]))[\/\.]\d{4}/m", $birthday)) {	
			$form_errors['birthday'] = sprintf(FORM_ERROR_MESSAGES["invalid_date"], "Дата народження");
		}
		
		if (empty($salary)) {
			$form_errors['salary'] = sprintf(FORM_ERROR_MESSAGES["empty"], "Зарплата");
		} else if (!preg_match("/[0-9]{3,10}/m", $salary)) {
			$form_errors['salary'] = sprintf(FORM_ERROR_MESSAGES["invalid_text"], "Зарплата", 3);
		}
		
		$get_faculty_query = $db->prepare("SELECT * FROM `faculties` WHERE `id` = ?");		
		try {
			$get_faculty_query->execute([$lecturer_faculty]);
			$rows = $get_faculty_query->fetchAll();

			if (count($rows) == 0) {
				$form_errors['lecturer_faculty'] = sprintf(FORM_ERROR_MESSAGES["not_exists"], "факультету");
			}
		} 
		catch (Exception $e) { }
		
		$get_degree_query = $db->prepare("SELECT * FROM `degrees` WHERE `id` = ?");
		try {
			$get_degree_query->execute([$lecturer_degree]);
			$rows = $get_degree_query->fetchAll();

			if (count($rows) == 0) {
				$form_errors['lecturer_degree'] = sprintf(FORM_ERROR_MESSAGES["not_exists"], "наукового ступеню");
			}
		} 
		catch (Exception $e) { }
		
		$get_position_query = $db->prepare("SELECT * FROM `positions` WHERE `id` = ?");
		try {
			$get_position_query->execute([$lecturer_position]);
			$rows = $get_position_query->fetchAll();

			if (count($rows) == 0) {
				$form_errors['lecturer_position'] = sprintf(FORM_ERROR_MESSAGES["not_exists"], "посади");
			}
		} 
		catch (Exception $e) { }

		if (empty($form_errors)) {
            $query = $db->prepare("INSERT INTO `lecturers` (`first_name`, `last_name`, `surname`, `birthday`, `salary`, `faculty_id`, `degree_id`, `position_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            $pib_exploded = explode(" ", $pib);

            $last_name = $pib_exploded[0];
            $first_name = $pib_exploded[1];
            $surname = $pib_exploded[2];
            
            $birthday_date = date("Y-m-d",strtotime($birthday));

            try {
				$query->execute([$first_name, $last_name, $surname, $birthday_date, $salary, $lecturer_faculty, $lecturer_degree, $lecturer_position]);
            }
            catch (Exception $e) {
                die("Помилка при спробі додати новий запис!");
            }
            			
			// redirect to unset $_POST
			header('location:'.$_SERVER['PHP_SELF']);
			die();
		}
	}

	// add faculty form handler
	if (isset($_POST['add-faculty'], $_POST['faculty_name'])) {
		$faculty_name = htmlspecialchars($_POST['faculty_name']);

		if (empty($faculty_name)) {
			$form_errors['faculty_name'] = sprintf(FORM_ERROR_MESSAGES["empty"], "Факультет");
		} else if (!preg_match("/[A-Za-zА-Яа-яЇїІіЄєҐґ'\\s]{2,}/m", $faculty_name)) {
			$form_errors['faculty_name'] = sprintf(FORM_ERROR_MESSAGES["invalid_text"], "Факультет", 2);
		} else {
			$get_faculty_query = $db->prepare("SELECT `id` FROM `faculties` WHERE `faculty_name` = ?");
			
			try {
				$get_faculty_query->execute([$faculty_name]);
				$rows = $get_faculty_query->fetchAll();

				if (count($rows) > 0) {
					$form_errors['faculty_name'] = sprintf(FORM_ERROR_MESSAGES["already_exists"], $faculty_name);
				}
			} 
			catch (Exception $e) { }
		}		

		if (empty($form_errors)) {
			$insert_faculty_query = $db->prepare("INSERT INTO `faculties` (`faculty_name`) VALUES (?)");

			try {
				$insert_faculty_query->execute([$faculty_name]);
			}
			catch (Exception $e) {
				die("Помилка при спробі додати новий запис!");
			}

			// redirect to unset $_POST
			header('location:'.$_SERVER['PHP_SELF']);
			die();
		}
	}

	// add degree form handler
	if (isset($_POST['add-degree'], $_POST['degree_name'])) {
		$degree_name = htmlspecialchars($_POST['degree_name']);

		if (empty($degree_name)) {
			$form_errors['degree_name'] = sprintf(FORM_ERROR_MESSAGES["empty"], "Науковий ступінь");
		} else if (!preg_match("/[A-Za-zА-Яа-яЇїІіЄєҐґ'\\s]{3,}/m", $degree_name)) {
			$form_errors['degree_name'] = sprintf(FORM_ERROR_MESSAGES["invalid_text"], "Науковий ступінь", 3);
		} else {
			$get_degree_query = $db->prepare("SELECT `id` FROM `degrees` WHERE `degree_name` = ?");
			
			try {
				$get_degree_query->execute([$degree_name]);
				$rows = $get_degree_query->fetchAll();

				if (count($rows) > 0) {
					$form_errors['degree_name'] = sprintf(FORM_ERROR_MESSAGES["already_exists"], $degree_name);
				}
			} 
			catch (Exception $e) { }
		}		

		if (empty($form_errors)) {
			$insert_degree_query = $db->prepare("INSERT INTO `degrees` (`degree_name`) VALUES (?)");

			try {
				$insert_degree_query->execute([$degree_name]);
			}
			catch (Exception $e) {
				die("Помилка при спробі додати новий запис!");
			}

			// redirect to unset $_POST
			header('location:'.$_SERVER['PHP_SELF']);
			die();
		}	
	}

	// add position form handler
	if (isset($_POST['add-position'], $_POST['position_name'])) {
		$position_name = htmlspecialchars($_POST['position_name']);

		if (empty($position_name)) {
			$form_errors['position_name'] = sprintf(FORM_ERROR_MESSAGES["empty"], "Посада");
		} else if (!preg_match("/[A-Za-zА-Яа-яЇїІіЄєҐґ'\\s]{3,}/m", $position_name)) {
			$form_errors['position_name'] = sprintf(FORM_ERROR_MESSAGES["invalid_text"], "Посада", 3);
		} else {
			$get_position_query = $db->prepare("SELECT `id` FROM `positions` WHERE `position_name` = ?");
			
			try {
				$get_position_query->execute([$position_name]);
				$rows = $get_position_query->fetchAll();

				if (count($rows) > 0) {
					$form_errors['position_name'] = sprintf(FORM_ERROR_MESSAGES["already_exists"], $position_name);
				}
			} 
			catch (Exception $e) { }
		}		

		if (empty($form_errors)) {
			$insert_position_query = $db->prepare("INSERT INTO `positions` (`position_name`) VALUES (?)");

			try {
				$insert_position_query->execute([$position_name]);
			}
			catch (Exception $e) {
				die("Помилка при спробі додати новий запис!");
			}

			// redirect to unset $_POST
			header('location:'.$_SERVER['PHP_SELF']);
			die();
		}		
	}

	function get_post_value($var_name) {
		return isset($_POST[$var_name]) ? $_POST[$var_name] : "";
	}
?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Лаб 6</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
			background-image: url('bgr.jpg');
		}

		h1 {			
			font-size: 26px;
		}

        h2 {
            margin: 15px 0;
            font-size: 22px;
        }

		table {
			background-color: white;
		}
		
		table, .list_rows_block, .add_row_block, .search_block, .search_result_block {		
			width: 1600px;
			margin: auto;
		}

		th, td {
			padding: 5px;
		}
		
		input, select {
			margin: 5px 0 0 0;
			padding: 0;
		}		
		
		input[type="submit"] {
			margin-top: 10px;
			width: 150px;
		}	

		.container {
			max-width: 1700px;
			margin-top: 15px;
			padding: 40px 0px ;
			border-radius: 25px;
			background-color: #F4F6F6;
			box-shadow: 0 0 10px rgba(0,0,0,0.3);
		}

		.add_row_block, .search_result_block {
			margin-top: 35px;
		}

		.insert_col {
			margin: 10px;
		}
	</style>
	<script>
		$(function() {
			var form_errors = jQuery.parseJSON('<?= json_encode($form_errors); ?>');

			for (let input_name in form_errors) {
				$(`input[name='${input_name}']`).addClass("is-invalid");
				$(`#${input_name}_error`).text(form_errors[input_name]);
			}					
		});
	</script>
</head>
<body>	
	<div class="container">
        <hr>
        <h1 style="text-align: center">Лабораторна робота 2 (MySQL)</h1>
        <hr>

		<div class="list_rows_block">
			<h1>Список усіх записів</h1>
			<table border="1" cellspacing="0">
				<tr>
					<th width="25%">ПІБ</th>
					<th width="15%">Факультет</th>
					<th width="15%">Дата народження</th>
					<th width="15%">Зарплата (ГРН)</th>
					<th width="15%">Науковий ступінь</th>
					<th width="15%">Посада</th>
				</tr>
                <?php
                    $stmt = $db->query(
						"SELECT * 
						FROM `lecturers` l 
						JOIN `degrees` d ON `l`.`degree_id` = `d`.`id`
						JOIN `faculties` f ON `l`.`faculty_id` = `f`.`id`
						JOIN `positions` p ON `l`.`position_id` = `p`.`id`"
					);
                    while ($row = $stmt->fetch()):
                ?>				
					<tr>				
                        <td><?= $row["last_name"] . " " . $row["first_name"] . " " . $row["surname"]; ?></td>
                        <td><?= $row["faculty_name"]; ?></td>
                        <td><?= $row["birthday"]; ?></td>
                        <td><?= $row["salary"]; ?></td>
                        <td><?= $row["degree_name"]; ?></td>
                        <td><?= $row["position_name"]; ?></td>
					</tr>
				<?php 
					endwhile;
				?>		
			</table>	
		</div>

		<div class="add_row_block">
			<div class="row">
				<div class="col-sm insert_col">
					<h1>Додати лектора</h1>
					<form method="POST" action="">
						<input type="text" name="pib" class="form-control" placeholder="ПІБ" pattern="[A-Za-zА-Яа-яЇїІіЄєҐґ'\s]{7,}" required value="<?= get_post_value('pib'); ?>">
						<div id="pib_error" class="invalid-feedback"></div> 							

						<input type="text" name="birthday" class="form-control" placeholder="Дата народження" pattern="^([0-2][0-9]|(3)[0-1])[\/\.](((0)[0-9])|((1)[0-2]))[\/\.]\d{4}$" required value="<?= get_post_value('birthday'); ?>">
						<div id="birthday_error" class="invalid-feedback"></div> 

						<input type="text" name="salary" class="form-control" placeholder="Зарплата" pattern="[0-9]{3,}" required value="<?= get_post_value('salary'); ?>">
						<div id="salary_error" class="invalid-feedback"></div> 

						<select name="lecturer_faculty" class="form-control" required value="<?= get_post_value('lecturer_faculty'); ?>">
						<?php
							$stmt = $db->query("SELECT * FROM `faculties`");				
							while ($row = $stmt->fetch()):
						?>		
							<option value="<?= $row["id"]; ?>"><?= $row["faculty_name"]; ?></option>
						<?php
							endwhile;
						?>
						</select>
						<div id="lecturer_faculty_error" class="invalid-feedback"></div> 						

						<select name="lecturer_degree" class="form-control" required value="<?= get_post_value('lecturer_degree'); ?>">
						<?php
							$stmt = $db->query("SELECT * FROM `degrees`");				
							while ($row = $stmt->fetch()):
						?>		
							<option value="<?= $row["id"]; ?>"><?= $row["degree_name"]; ?></option>
						<?php
							endwhile;
						?>
						</select>
						<div id="lecturer_degree_error" class="invalid-feedback"></div> 

						<select name="lecturer_position" class="form-control" required value="<?= get_post_value('lecturer_position'); ?>">
						<?php
							$stmt = $db->query("SELECT * FROM `positions`");				
							while ($row = $stmt->fetch()):
						?>		
							<option value="<?= $row["id"]; ?>"><?= $row["position_name"]; ?></option>
						<?php
							endwhile;
						?>
						</select>
						<div id="lecturer_position_error" class="invalid-feedback"></div> 

						<input type="submit" name="add-lecturer" class="btn btn-primary" value="Додати">
					</form>
				</div>
				<div class="col-sm insert_col">
					<h1>Додати факультет</h1>
					<form method="POST" action="">
						<input type="text" name="faculty_name" class="form-control" placeholder="Факультет" pattern="[A-Za-zА-Яа-яЇїІіЄєҐґ'\s]{2,}" required value="<?= get_post_value('faculty_name'); ?>">
						<div id="faculty_name_error" class="invalid-feedback"></div> 								

						<input type="submit" name="add-faculty" class="btn btn-primary" value="Додати">
					</form>
				</div>
				<div class="col-sm insert_col">
					<h1>Додати науковий ступінь</h1>
					<form method="POST" action="">
						<input type="text" name="degree_name" class="form-control" placeholder="Науковий ступінь" pattern="[A-Za-zА-Яа-яЇїІіЄєҐґ'\s]{2,}" required value="<?= get_post_value('degree_name'); ?>">
						<div id="degree_name_error" class="invalid-feedback"></div> 	

						<input type="submit" name="add-degree" class="btn btn-primary" value="Додати">
					</form>
				</div>
				<div class="col-sm insert_col">
					<h1>Додати посаду</h1>
					<form method="POST" action="">
						<input type="text" name="position_name" class="form-control" placeholder="Посада" pattern="[A-Za-zА-Яа-яЇїІіЄєҐґ'\s]{2,}" required value="<?= get_post_value('position_name'); ?>">
						<div id="position_name_error" class="invalid-feedback"></div> 	

						<input type="submit" name="add-position" class="btn btn-primary" value="Додати">
					</form>
				</div>			
			</div>
		</div>

        <hr>
        <h1 style="text-align: center">Лабораторна робота 3 (MySQL)</h1>
        <hr>

        <div class="list_rows_block">
			<h1>Список викладачів, впорядкований по зарплаті</h1>
			<table border="1" cellspacing="0">
				<tr>
					<th width="25%">ПІБ</th>
					<th width="15%">Факультет</th>
					<th width="15%">Дата народження</th>
					<th width="15%">Зарплата (ГРН)</th>
					<th width="15%">Науковий ступінь</th>
					<th width="15%">Посада</th>
				</tr>
				<?php
                    $stmt = $db->query(
						"SELECT * 
						FROM `lecturers` l 
						JOIN `degrees` d ON `l`.`degree_id` = `d`.`id`
						JOIN `faculties` f ON `l`.`faculty_id` = `f`.`id`
						JOIN `positions` p ON `l`.`position_id` = `p`.`id`
						ORDER BY `l`.`salary`"
					);				
                    while ($row = $stmt->fetch()):
                ?>				
					<tr>				
						<td><?= $row["last_name"] . " " . $row["first_name"] . " " . $row["surname"]; ?></td>
                        <td><?= $row["faculty_name"]; ?></td>
                        <td><?= $row["birthday"]; ?></td>
                        <td><?= $row["salary"]; ?></td>
                        <td><?= $row["degree_name"]; ?></td>
                        <td><?= $row["position_name"]; ?></td>
					</tr>
				<?php 
					endwhile;
                ?>		                
            </table>	
			<?php
				$stmt = $db->query(
					"SELECT COUNT(*) AS `fpm_docent_count` 
					FROM `lecturers` l 
					JOIN `degrees` d ON `l`.`degree_id` = `d`.`id`
					JOIN `faculties` f ON `l`.`faculty_id` = `f`.`id`
					WHERE `f`.`faculty_name` LIKE 'ФПМ' 
					AND `d`.`degree_name` LIKE 'Доцент'"
				);				
                $result = $stmt->fetch();
            ?>	
            <h2>Кількість доцентів на ФПМ: <?= $result['fpm_docent_count']; ?></h2>
        </div>
        
        <hr>
        <h1 style="text-align: center">Лабораторна робота 4 (MySQL)</h1>
        <hr>
        
        <div class="search_block">
            <form method="GET" action="">
                <input type="text" class="form-control" name="last_name" placeholder="Введіть символи, які містяться в прізвищі">
                <input type="submit" class="btn btn-primary" value="Відправити">
            </form>
        </div>

        <?php if (isset($_GET['last_name'])): ?>
        <div class="search_result_block">        
            <?php
                $stmt = $db->prepare(
					"SELECT * FROM `lecturers` l
					JOIN `degrees` d ON `l`.`degree_id` = `d`.`id`
					JOIN `faculties` f ON `l`.`faculty_id` = `f`.`id`
					JOIN `positions` p ON `l`.`position_id` = `p`.`id`		
					WHERE `last_name` LIKE ?"
				);
                $stmt->execute(['%' . $_GET['last_name'] . '%']);
                $rows = $stmt->fetchAll();

                if (count($rows) > 0):
            ?>
            <h1>Список викладачів, в прізвищі яких містяться символи: <?= $_GET['last_name']; ?></h1>
			<table border="1" cellspacing="0">
				<tr>
					<th width="25%">ПІБ</th>
					<th width="15%">Факультет</th>
					<th width="15%">Дата народження</th>
					<th width="15%">Зарплата (ГРН)</th>
					<th width="15%">Науковий ступінь</th>
					<th width="15%">Посада</th>
				</tr>
                <?php foreach ($rows as $row): ?>				
					<tr>				
                        <td><?= $row["last_name"] . " " . $row["first_name"] . " " . $row["surname"]; ?></td>
                        <td><?= $row["faculty_name"]; ?></td>
                        <td><?= $row["birthday"]; ?></td>
                        <td><?= $row["salary"]; ?></td>
                        <td><?= $row["degree_name"]; ?></td>
                        <td><?= $row["position_name"]; ?></td>
					</tr>
				<?php endforeach; ?>		                
            </table>
            <?php else: ?>
                <h2>Таких викладачів не знайдено!</h2>
            <?php endif; ?>
        </div>
        <?php endif; ?>
	</div>
</body>
</html>