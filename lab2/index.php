<?php 
	define("DATA_FILENAME", "data.csv");
	define("CSV_DELIMITER", ";");
	define("FORM_ERROR_MESSAGES", [
		"empty" => "Поле %s не може бути порожнім!",
		"invalid_date" => "Поле %s має бути в правильному форматі (день.місяць.рік)!",
		"invalid_text" => "Поле %s має містити мінімум %d символів і бути в правильному форматі!"
	]);
	
	$read_file_handle = fopen(DATA_FILENAME, "r");
	if (!$read_file_handle) {
		die("Error open data file");
	}
	
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
			$csv_arr = [ $pib, $faculty, $birthday, $salary, $degree, $position ];

			$write_file_handle = fopen(DATA_FILENAME, "a");			
			fputcsv ($write_file_handle, $csv_arr, CSV_DELIMITER);			
			fclose($write_file_handle);	
			
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
	<title>Лаб 2</title>
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

		table {
			background-color: white;
		}
		
		table, .list_rows_block, .add_row_block {		
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
			width: 100px;
		}	

		.container {
			max-width: 1700px;
			margin-top: 15px;
			padding: 40px 0px ;
			border-radius: 25px;
			background-color: #F4F6F6;
			box-shadow: 0 0 10px rgba(0,0,0,0.3);
		}

		.add_row_block {
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
				<?php while (($cells = fgetcsv($read_file_handle, 0, CSV_DELIMITER)) !== FALSE): ?>					
					<tr>
					<?php foreach ($cells as $cell): ?>					
						<td><?= $cell; ?></td>
					<?php endforeach; ?>
					</tr>
				<?php 
					endwhile; 
					fclose($read_file_handle); 
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
	</div>
</body>
</html>