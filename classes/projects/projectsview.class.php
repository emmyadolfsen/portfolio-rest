<?php

class ProjectsView extends Projects {
    // Hämta data från getCourse - skicka till showCourse
    public function showProject($id) {
        $result = $this->getProject($id);
        // Gör om till json och skriv ut med pretty print
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT);

    }

    public function showProjects() {
        // Hämta data från getCourses
        $result = $this->getProjects();

            // Gör om till json med ett pretty print
            header('Content-Type: application/json');
            echo json_encode($result, JSON_PRETTY_PRINT);
        
    }

}