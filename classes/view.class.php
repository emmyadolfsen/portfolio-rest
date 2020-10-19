<?php

class View extends Portfolio {

    public function showObject($id, $table_name) {                       

        $result = $this->getObject($id, $table_name);       // Skicka med id och tabellnamn för att hämta ut object
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT);      // Gör om till json och skriv ut med pretty print
    }

    public function showObjects($table_name) {
                    
        $result = $this->getObjects($table_name);       // Skicka med tabellnamn för att hämta alla objekt  
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT);   // Gör om till json och skriv ut med pretty print
    }
}