<?php

class CoursesView extends Portfolio {

    public function showCourse($id) {                     
        
        $table_name = 'courses_read';                       // Skicka med id och tabellnamn för att hämta ut
        $result = $this->getObject($id, $table_name);       // kurser från tabellen courses_read med specifikt id
        
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT);      // Gör om till json och skriv ut med pretty print
    }

    public function showCourses() {

        $table_name = 'courses_read';                       // Skicka med tabellnamn och
        $result = $this->getObjects($table_name);           // hämta allt från tabellen courses_read

        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT);   // Gör om till json och skriv ut med pretty print
    }

}