<?php
require_once __DIR__ . "/../../../config/lab6_db.php";
require_once __DIR__ . "/dao/pdo/LecturerDaoPdo.php";
require_once __DIR__ . "/dao/pdo/FacultyDaoPdo.php";
require_once __DIR__ . "/dao/pdo/DegreeDaoPdo.php";
require_once __DIR__ . "/dao/pdo/PositionDaoPdo.php";

echo "<hr>Lecturers<hr>";

$lecturerDao = new LecturerDaoPdo($db);
$lecturers = $lecturerDao->getAll();

foreach ($lecturers as $lecturer) {
    echo print_r($lecturer->toArray());
    echo "<br><br>";
}

echo "<hr>Faculties<hr>";

$facultyDao = new FacultyDaoPdo($db);
$faculties = $facultyDao->getAll();

foreach ($faculties as $faculty) {
    echo print_r($faculty->toArray());
    echo "<br><br>";
}

echo "<hr>Degrees<hr>";

$degreeDao = new DegreeDaoPdo($db);
$degrees = $degreeDao->getAll();

foreach ($degrees as $degree) {
    echo print_r($degree->toArray());
    echo "<br><br>";
}

echo "<hr>Positions<hr>";

$positionDao = new PositionDaoPdo($db);
$positions = $positionDao->getAll();

foreach ($positions as $position) {
    echo print_r($position->toArray());
    echo "<br><br>";
}

echo "<hr>Lecturers from faculty 'ФПМ'<hr>";
$faculty = $facultyDao->findOneWithName("ФПМ");
$lecturers = $lecturerDao->findAllWithFaculty($faculty->getId());
foreach ($lecturers as $lecturer) {
    echo print_r($lecturer->toArray());
    echo "<br><br>";
}

echo "<hr>Tests<hr>";

$lector1 = $lecturerDao->findOneWithFirstName("Володя");
if ($lector1 !== FALSE) {
    $lecturerDao->delete($lector1->getId());
    echo "Deleted record with id: {$lector1->getId()}<br>";
}

$lector2 = new Lecturer();
$lector2->setFirstName("Володя")
        ->setLastName("Сухолиткий")
        ->setSurname("Іванович")
        ->setBirthday("2000-01-01")
        ->setSalary(5000)
        ->setPositionId(1)
        ->setFacultyId(1)
        ->setDegreeId(1);

$lecturerId = $lecturerDao->insert($lector2);
$lector2->setId($lecturerId);

$lector2->setSalary(500000);
$lecturerDao->update($lector2);

echo "Lecturer after tests: <br>";
print_r($lector2->toArray());