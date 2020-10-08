<?php

class ProjectsContr extends Projects {

    // funktion för att lägga till ny kurs
    public function createProject($project_name, $project_url, $project_d) {
        // Flyttar data eftersom setCourse är protected för säkerhet
        // Annras hade man kunnat gå raka vägen 
        $this->setProject($project_name, $project_url, $project_d);
        return true;
    }
    
    // Funktion för att uppdatera kurs
    public function updateProjectContr($id, $project_name, $project_url, $project_d) {
        // Flyttar data
        $this->updateProject($id, $project_name, $project_url, $project_d);
        return true;
    }

    // Funktion för att radera kurs
    public function deleteProjectContr($id) {
        // Flyttar data
        $this->deleteProject($id);
        return true;
    }
}