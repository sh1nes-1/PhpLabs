<?php
require_once __DIR__ . "/Dao.php";

interface DegreeDao extends Dao {

    function findOneWithName($name);

}