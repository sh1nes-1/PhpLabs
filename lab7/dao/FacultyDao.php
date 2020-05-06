<?php
require_once __DIR__ . "/Dao.php";

interface FacultyDao extends Dao {

    function findOneWithName($name);

}