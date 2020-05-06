<?php
require_once __DIR__ . "/Dao.php";

interface PositionDao extends Dao {

    function findOneWithName($name);

}