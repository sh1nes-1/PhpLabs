<?php
require_once __DIR__ . "/../models/Lecturer.php";
require_once __DIR__ . "/../models/Faculty.php";
require_once __DIR__ . "/../dao/LecturerDAO.php";

class LecturerService {
    public LecturerDao $lecturerDao;

    public function __construct(LecturerDao $lecturerDao) {
        $this->lecturerDao = $lecturerDao;
    }
    
    public function getLecturersByFaculty(Faculty $faculty) {
        $this->lecturerDao->getAll();
    }
}