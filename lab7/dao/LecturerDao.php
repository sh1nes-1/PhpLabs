<?php
require_once __DIR__ . "/Dao.php";

interface LecturerDao extends Dao {

    function findOneWithFirstName($first_name);

    function findAllWithFaculty($faculty_id);

}