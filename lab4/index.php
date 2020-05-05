<?php 
define("DATA_FILENAME", "../lab2/data.csv");
define("CSV_DELIMITER", ";");

$read_file_handle = fopen(DATA_FILENAME, "r");
if (!$read_file_handle) {
    die("Error open data file");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Лаб 4</title>
</head>
<body>
    <?php if (isset($_GET['last_name'])): ?>
        <?php 
        $found_last_names = [];
        while (($cells = fgetcsv($read_file_handle, 0, CSV_DELIMITER)) !== FALSE) {
            $last_name = explode(" ", $cells[0])[0]; 
            if (strpos($last_name, $_GET['last_name']) !== FALSE)
                $found_last_names[count($found_last_names)] = $last_name;            
        }
        ?>

        <h3>Прізвища викладачів, у яких містяться символи: <?= $_GET['last_name']; ?></h3>      
        <?php if (count($found_last_names) > 0): ?>
            <ul>
                <?php foreach ($found_last_names as $last_name): ?>
                    <li><?= $last_name; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <h4>Таких викладачів не знайдено!</h4>
        <?php endif; ?>
        
        <hr>        
    <?php endif; ?>
    <form method="GET" action="">
        <input name="last_name" placeholder="Введіть символи, які містяться в прізвищі" style="width: 300px">
        <input type="submit" value="Відправити">
    </form>
</body>