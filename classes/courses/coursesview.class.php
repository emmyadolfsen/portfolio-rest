<?php

class CoursesView extends Courses {
    // Hämta data från getCourse - skicka till showCourse
    public function showCourse($id) {
        $result = $this->getCourse($id);
        // Gör om till json och skriv ut med pretty print
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT);

    }

    public function showCourses() {
        // Hämta data från getCourses
        $result = $this->getCourses();

            // Gör om till json med ett pretty print
            header('Content-Type: application/json');
            echo json_encode($result, JSON_PRETTY_PRINT);
        
    }

}