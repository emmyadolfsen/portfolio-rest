<?php

class ProjectsView extends Portfolio {

    public function showProject($id) {                  

        $table_name = 'myprojects';                     // Skicka med id och tabellnamn för att hämta ut
        $result = $this->getObject($id, $table_name);   // projekt från tabellen myprojects med specifikt id
        
        header('Content-Type: application/json');       
        echo json_encode($result, JSON_PRETTY_PRINT);       // Gör om till json och skriv ut med pretty print

    }

    public function showProjects() {

        $table_name = 'myprojects';                     // Skicka med tabellnamn och
        $result = $this->getObjects($table_name);       // hämta allt från tabellen myprojects
            
            header('Content-Type: application/json');   
            echo json_encode($result, JSON_PRETTY_PRINT);   // Gör om till json och skriv ut med pretty print
        
    }

}