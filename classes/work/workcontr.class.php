<?php

class WorkContr extends Portfolio {

    // Funktion för att lägga till nytt jobb
    public function createWork($work_name, $work_place, $work_title, $work_date) {
        
        $post = '$work_name, $work_place, $work_title, $work_date';
        $sql_insert = "work(work_name, work_place, work_title, work_date) VALUES ('$work_name', '$work_place', '$work_title', '$work_date')";
        $this->setObject($sql_insert, $post);   // Skickar med resten av SQL-frågan 'INSERT INTO..' ($sql_insert)
        return true;                            // Skickar med parametrarna som ska hämtas från databastabellen ($post) 
    }

    // Funktion för att uppdatera jobb
    public function updateWorkContr($id, $work_name, $work_place, $work_title, $work_date) {
        // Flyttar data
        $sql_set = "work_name = '$work_name', work_place = '$work_place', work_title = '$work_title', work_date = '$work_date' WHERE id = $id";
        $table_name = 'work';
        $post = '$id, $work_name, $work_place, $work_title, $work_date';
        $this->updateObject($table_name, $sql_set, $post);  // Skickar med tabellnamn($table_name), resten av SQL-frågan: 'UPDATE $table_name SET..' ($sql_set)
        return true;                                        // samt parametrar som ska hämtas från databasen ($post)  
    }

    // Funktion för att radera jobb
    public function deleteWorkContr($id) {

        $table_name = 'work';
        $this->deleteObject($id, $table_name);      // Skickar med id och tabellnamn($table_name)
        return true;
    }
}