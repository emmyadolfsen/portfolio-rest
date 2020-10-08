<?php

class WorkContr extends Work {

    // funktion för att lägga till ny kurs
    public function createWork($work_name, $work_place, $work_title, $work_date) {
        // Flyttar data eftersom setCourse är protected för säkerhet
        // Annras hade man kunnat gå raka vägen 
        $this->setWork($work_name, $work_place, $work_title, $work_date);
        return true;
    }
    
    // Funktion för att uppdatera kurs
    public function updateWorkContr($id, $work_name, $work_place, $work_title, $work_date) {
        // Flyttar data
        $this->updateWork($id, $work_name, $work_place, $work_title, $work_date);
        return true;
    }

    // Funktion för att radera kurs
    public function deleteWorkContr($id) {
        // Flyttar data
        $this->deleteWork($id);
        return true;
    }
}