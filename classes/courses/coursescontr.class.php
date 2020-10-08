<?php

class CoursesContr extends Courses {

    // funktion för att lägga till ny kurs
    public function createCourse($university, $course_name, $course_date) {
        // Flyttar data eftersom setCourse är protected för säkerhet
        // Annras hade man kunnat gå raka vägen 
        $this->setCourse($university, $course_name, $course_date);
        return true;
    }
    
    // Funktion för att uppdatera kurs
    public function updateContr($id, $university, $course_name, $course_date) {
        // Flyttar data
        $this->updateCourse($id, $university, $course_name, $course_date);
        return true;
    }

    // Funktion för att radera kurs
    public function deleteContr($id) {
        // Flyttar data
        $this->deleteCourse($id);
        return true;
    }
}