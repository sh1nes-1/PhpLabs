<?php
require_once "../models/Lecturer.php";
require_once "../models/Faculty.php";
require_once "../dao/LecturerDAO.php";

class LecturerService {
    public LecturerDao $lecturerDao;

    public function __construct(LecturerDao $lecturerDao) {
        $this->lecturerDao = $lecturerDao;
    }
    
    public function getLecturersByFaculty(Faculty $faculty) {
        $this->lecturerDao->getAll();
    }
}