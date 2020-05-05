<?php

interface LecturerDao extends Dao {

    function findAllWithFaculty($facultyId);

}