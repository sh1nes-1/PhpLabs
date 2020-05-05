<?php 
	require_once "../../../config/lab5_db.php";

	define("FORM_ERROR_MESSAGES", [
		"empty" => "Поле %s не може бути порожнім!",
		"invalid_date" => "Поле %s має бути в правильному форматі (день.місяць.рік)!",
		"invalid_text" => "Поле %s має містити мінімум %d символів і бути в правильному форматі!"
    ]);  
	
	$form_errors = [];

	if (isset($_POST['pib'], $_POST['faculty'], $_POST['birthday'], $_POST['salary'], $_POST['degree'], $_POST['position'])) {
		$pib = htmlspecialchars($_POST['pib']);
		$faculty = htmlspecialchars($_POST['faculty']);
		$birthday = htmlspecialchars($_POST['birthday']);
		$salary = htmlspecialchars($_POST['salary']);		
		$degree = htmlspecialchars($_POST['degree']);		
		$position = htmlspecialchars($_POST['position']);		

		if (empty($pib)) {			
			$form_errors['pib'] = sprintf(FORM_ERROR_MESSAGES["empty"], "ПІБ");
		} else if (!preg_match("/[A-Za-zА-Яа-яЇїІіЄєҐґ'\\s]{7,}/m", $pib)) {
			$form_errors['pib'] = sprintf(FORM_ERROR_MESSAGES["invalid_text"], "ПІБ", 7);
		}

		if (empty($faculty)) {
			$form_errors['faculty'] = sprintf(FORM_ERROR_MESSAGES["empty"], "Факультет");
		} else if (!preg_match("/[A-Za-zА-Яа-яЇїІіЄєҐґ'\\s]{2,}/m", $faculty)) {
			$form_errors['faculty'] = sprintf(FORM_ERROR_MESSAGES["invalid_text"], "Факультет", 2);
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

		if (empty($degree)) {
			$form_errors['degree'] = sprintf(FORM_ERROR_MESSAGES["empty"], "Науковий ступінь");
		} else if (!preg_match("/[A-Za-zА-Яа-яЇїІіЄєҐґ'\\s]{3,}/m", $degree)) {
			$form_errors['degree'] = sprintf(FORM_ERROR_MESSAGES["invalid_text"], "Науковий ступінь", 3);
		}
		
		if (empty($position)) {
			$form_errors['position'] = sprintf(FORM_ERROR_MESSAGES["empty"], "Посада");
		} else if (!preg_match("/[A-Za-zА-Яа-яЇїІіЄєҐґ'\\s]{3,}/m", $position)) {
			$form_errors['position'] = sprintf(FORM_ERROR_MESSAGES["invalid_text"], "Посада", 3);
		}

		if (empty($form_errors)) {
            $query = $db->prepare("INSERT INTO `lecturers` (`first_name`, `last_name`, `surname`, `faculty`, `birthday`, `salary`, `degree`, `position`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            $pib_exploded = explode(" ", $pib);

            $last_name = $pib_exploded[0];
            $first_name = $pib_exploded[1];
            $surname = $pib_exploded[2];
            
            $birthday_date = date("Y-m-d",strtotime($birthday));

            try {
                $query->execute([$first_name, $last_name, $surname, $faculty, $birthday_date, $salary, $degree, $position]);
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
	<title>Лаб 5</title>
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
		
		input {
			margin: 5px 0 0 0;
			padding: 0;
		}		
		
		input[type="submit"] {
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
	</style>
	<script>
		$(function() {
			var form_errors = <?= json_encode($form_errors); ?>;

			if (form_errors.pib) {
				$("input[name='pib']").addClass("is-invalid");
				$("#pib_error").text(form_errors.pib);
			}

			if (form_errors.faculty) {
				$("input[name='faculty']").addClass("is-invalid");
				$("#faculty_error").text(form_errors.faculty);
			}		

			if (form_errors.birthday) {
				$("input[name='birthday']").addClass("is-invalid");
				$("#birthday_error").text(form_errors.birthday);
			}	
			
			if (form_errors.salary) {
				$("input[name='salary']").addClass("is-invalid");
				$("#salary_error").text(form_errors.salary);
			}

			if (form_errors.degree) {
				$("input[name='degree']").addClass("is-invalid");
				$("#salary_error").text(form_errors.degree);
			}			
			
			if (form_errors.position) {
				$("input[name='position']").addClass("is-invalid");
				$("#salary_error").text(form_errors.position);
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
                    $stmt = $db->query("SELECT * FROM `lecturers`");
                    while ($row = $stmt->fetch()):
                ?>				
					<tr>				
                        <td><?= $row["last_name"] . " " . $row["first_name"] . " " . $row["surname"]; ?></td>
                        <td><?= $row["faculty"]; ?></td>
                        <td><?= $row["birthday"]; ?></td>
                        <td><?= $row["salary"]; ?></td>
                        <td><?= $row["degree"]; ?></td>
                        <td><?= $row["position"]; ?></td>
					</tr>
				<?php 
					endwhile;
				?>		
			</table>	
		</div>

		<div class="add_row_block">
			<h1>Додати новий запис</h1>
			<form method="POST" action="">
				<input type="text" name="pib" class="form-control" placeholder="Прізвище Ім'я По батькові" pattern="[A-Za-zА-Яа-яЇїІіЄєҐґ'\s]{7,}" required value="<?= get_post_value('pib'); ?>">
				<div id="pib_error" class="invalid-feedback"></div> 		
				
				<input type="text" name="faculty" class="form-control" placeholder="Факультет" pattern="[A-Za-zА-Яа-яЇїІіЄєҐґ'\s]{2,}" required value="<?= get_post_value('faculty'); ?>">
				<div id="faculty_error" class="invalid-feedback"></div> 

				<input type="text" name="birthday" class="form-control" placeholder="Дата народження" pattern="^([0-2][0-9]|(3)[0-1])[\/\.](((0)[0-9])|((1)[0-2]))[\/\.]\d{4}$" required value="<?= get_post_value('birthday'); ?>">
				<div id="birthday_error" class="invalid-feedback"></div> 

				<input type="text" name="salary" class="form-control" placeholder="Зарплата" pattern="[0-9]{3,}" required value="<?= get_post_value('salary'); ?>">
				<div id="salary_error" class="invalid-feedback"></div> 

				<input type="text" name="degree" class="form-control" placeholder="Науковий ступінь" pattern="[A-Za-zА-Яа-яЇїІіЄєҐґ'\s]{2,}" required value="<?= get_post_value('degree'); ?>">
				<div id="degree_error" class="invalid-feedback"></div> 

				<input type="text" name="position" class="form-control" placeholder="Посада" pattern="[A-Za-zА-Яа-яЇїІіЄєҐґ'\s]{2,}" required value="<?= get_post_value('position'); ?>">
				<div id="position_error" class="invalid-feedback"></div> 

				<input type="submit" class="btn btn-primary" value="Додати">
			</form>
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
                    $stmt = $db->query("SELECT * FROM `lecturers` ORDER BY `salary`");
                    while ($row = $stmt->fetch()):
                ?>				
					<tr>				
						<td><?= $row["last_name"] . " " . $row["first_name"] . " " . $row["surname"]; ?></td>
                        <td><?= $row["faculty"]; ?></td>
                        <td><?= $row["birthday"]; ?></td>
                        <td><?= $row["salary"]; ?></td>
                        <td><?= $row["degree"]; ?></td>
                        <td><?= $row["position"]; ?></td>
					</tr>
				<?php 
					endwhile;
                ?>		                
            </table>	
            <?php
                $stmt = $db->query("SELECT COUNT(*) AS 'fpm_docent_count' FROM `lecturers` WHERE faculty= 'ФПМ' AND degree = 'Доцент'");
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
                $stmt = $db->prepare("SELECT * FROM `lecturers` WHERE `last_name` LIKE ?");
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
                        <td><?= $row["faculty"]; ?></td>
                        <td><?= $row["birthday"]; ?></td>
                        <td><?= $row["salary"]; ?></td>
                        <td><?= $row["degree"]; ?></td>
                        <td><?= $row["position"]; ?></td>
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