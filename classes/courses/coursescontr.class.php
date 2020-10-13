<?php

class CoursesContr extends Portfolio {

    // funktion för att lägga till ny kurs
    public function createCourse($university, $course_name, $course_date) {

        $post = '$university, $course_name, $course_date';
        $sql_insert = "courses_read(university, course_name, course_date) VALUES ('$university', '$course_name', '$course_date')";
        $this->setObject($sql_insert, $post);   // Skickar med resten av SQL-frågan 'INSERT INTO..' ($sql_insert)
        return true;                            // Skickar med parametrarna som ska hämtas från databastabellen ($post) returnerar bool
    }

    // Funktion för att uppdatera kurs
    public function updateContr($id, $university, $course_name, $course_date) {

        $table_name = 'courses_read';
        $sql_set = "university = '$university', course_name = '$course_name', course_date = '$course_date' WHERE id = $id";
        $post = '$id, $university, $course_name, $course_date';
        $this->updateObject($table_name, $sql_set, $post);  // Skickar med tabellnamn($table_name), resten av SQL-frågan: 'UPDATE $table_name SET..' ($sql_set)
        return true;                                        // samt parametrar som ska hämtas från databasen ($post)  
    }

    // Funktion för att radera kurs
    public function deleteContr($id) {

        $table_name = 'courses_read';
        $this->deleteObject($id, $table_name);  // Skickar med id och tabellnamn($table_name)
        return true;
    }
}