<?php

class ProjectsContr extends Portfolio {

    // Funktion för att lägga till nytt projekt
    public function createProject($project_name, $project_url, $project_d, $project_img) {

        $post = '$project_name, $project_url, $project_d, $project_img'; 
        $sql_insert = "myprojects(project_name, project_url, project_d, project_img) VALUES ('$project_name', '$project_url', '$project_d', '$project_img')";
        $this->setObject($sql_insert, $post);   // Skickar med resten av SQL-frågan 'INSERT INTO..' ($sql_insert)
        return true;                            // Skickar med parametrarna som ska hämtas från databastabellen ($post)                   
        
    }
    
    // Funktion för att uppdatera projekt
    public function updateProjectContr($id, $project_name, $project_url, $project_d, $project_img) {

        $sql_set = "project_name = '$project_name', project_url = '$project_url', project_d = '$project_d', project_img = '$project_img' WHERE id = $id";
        $table_name = 'myprojects';
        $post = '$id, $project_name, $project_url, $project_d, $project_img';
        $this->updateObject($table_name, $sql_set, $post);  // Skickar med tabellnamn($table_name), resten av SQL-frågan: 'UPDATE $table_name SET..' ($sql_set)
        return true;                                        // samt parametrar som ska hämtas från databasen ($post)                                                       
        
    }

    // Funktion för att radera projekt
    public function deleteProjectContr($id) {

        $table_name = 'myprojects';
        $this->deleteObject($id, $table_name);     // Skickar med id och tabellnamn($table_name)
        return true;
    }
}