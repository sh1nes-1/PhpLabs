<?php
require_once __DIR__ . "/../../../config/lab6_db.php";
require_once __DIR__ . "/dao/Dao.php";
require_once __DIR__ . "/dao/LecturerDao.php";
require_once __DIR__ . "/dao/pdo/PdoDao.php";
require_once __DIR__ . "/dao/pdo/LecturerDaoPdo.php";

$lecturerDaoPdo = new LecturerDaoPdo($db);
$lecturers = $lecturerDaoPdo->getAll();
foreach ($lecturers as $lecturer) {
    echo print_r($lecturer->toArray());
    echo "<br><br>";
}