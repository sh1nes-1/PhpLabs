<?php 
define("DATA_FILENAME", "../lab2/data.csv");
define("CSV_DELIMITER", ";");

$read_file_handle = fopen(DATA_FILENAME, "r");
if (!$read_file_handle) {
    die("Error open data file");
}

$teachers_info = [];

while (($cells = fgetcsv($read_file_handle, 0, CSV_DELIMITER)) !== FALSE) {
    $teachers_info[count($teachers_info)] = $cells;
}

usort($teachers_info, function ($a, $b) { 
    return (int)$a[3] - (int)$b[3]; 
});
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Лаб 3</title>
</head>
<body>
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

        <?php $fpm_docent_count = 0; foreach ($teachers_info as $row): ?>
            <tr <?php if ($row[1] == "ФПМ" && $row[4] == "Доцент"): $fpm_docent_count++; ?>style="background-color: #cccccc"<?php endif; ?>>
            
            <?php foreach ($row as $cell): ?>
                <td><?= $cell; ?></td>
            <?php endforeach; ?>

            </tr>
        <?php endforeach; ?>
        </table>

        <?php
        // Якщо потрібно не лише порахувати кількість, а й отримати інформацію про них
        // $arr = array_filter($teachers_info, function ($row) {        
        //    return $row[1] == "ФПМ" && $row[4] == "Доцент";
        // });       
        ?>

    <h2>Кількість доцентів на ФПМ: <?= $fpm_docent_count; ?></h2>
</body>