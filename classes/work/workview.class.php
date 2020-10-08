<?php

class WorkView extends Work {
    // Hämta data från getCourse - skicka till showCourse
    public function showWork($id) {
        $result = $this->getWork($id);
        // Gör om till json och skriv ut med pretty print
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT);

    }

    public function showAllWork() {
        // Hämta data från getCourses
        $result = $this->getAllWork();

            // Gör om till json med ett pretty print
            header('Content-Type: application/json');
            echo json_encode($result, JSON_PRETTY_PRINT);
        
    }

}