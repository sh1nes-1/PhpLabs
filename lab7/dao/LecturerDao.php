<?php
require_once __DIR__ . "/Dao.php";

interface LecturerDao extends Dao {

    function findAllWithFaculty($facultyId);

}