<?php

class Control extends Portfolio {

    // funktion för att lägga till ny kurs
    public function createObject($table_name, $column, $obj1, $obj2, $obj3, $obj4) {

        //$post = '$university, $course_name, $course_date';
        $sql_insert = "$table_name($column) VALUES ('$obj1', '$obj2', '$obj3', '$obj4')";
        $this->setObject($sql_insert);   // Skickar med resten av SQL-frågan 'INSERT INTO..' ($sql_insert)
        return true;                            // returnerar bool
    }


    // Funktion för att uppdatera kurs
    public function updateContr($table_name, $id, $col1, $col2, $col3, $col4, $obj1, $obj2, $obj3, $obj4) {
        $sql_set = "$col1 = '$obj1', $col2 = '$obj2', $col3 = '$obj3', $col4 = '$obj4' WHERE id = $id";
        $this->updateObject($table_name, $sql_set);  // Skickar med tabellnamn($table_name), resten av SQL-frågan: 'UPDATE $table_name SET..' ($sql_set)
        return true;                                        // samt parametrar som ska hämtas från databasen ($post)  
    }
    

    // Funktion för att radera kurs
    public function deleteContr($id, $table_name) {

        $this->deleteObject($id, $table_name);  // Skickar med id och tabellnamn($table_name)
        return true;
    }
}