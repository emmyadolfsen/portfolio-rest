<?php

class WorkView extends Portfolio {
    
    public function showWork($id) {                     // Skicka med id och tabellnamn för att hämta ut 
        $table_name = 'work';                           // jobb från tabellen work med specifikt id
        $result = $this->getObject($id, $table_name);
        
        header('Content-Type: application/json');       
        echo json_encode($result, JSON_PRETTY_PRINT);   // Gör om till json och skriv ut med pretty print
    }

    public function showAllWork() {
        
        $table_name = 'work';                           // Skicka med tabellnamn och
        $result = $this->getObjects($table_name);       // hämta allt från tabellen work

            header('Content-Type: application/json');   
            echo json_encode($result, JSON_PRETTY_PRINT);   // Gör om till json och skriv ut med pretty print
    }

}