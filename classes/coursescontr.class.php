<?php

class CoursesContr extends Courses {

    // funktion för att lägga till ny kurs
    public function createCourse($coursecode, $coursename, $progression, $syllabus) {
        // Flyttar data eftersom setCourse är protected för säkerhet
        // Annras hade man kunnat gå raka vägen 
        $this->setCourse($coursecode, $coursename, $progression, $syllabus);
        return true;
    }
    
    // Funktion för att uppdatera kurs
    public function updateContr($id, $coursecode, $coursename, $progression, $syllabus) {
        // Flyttar data
        $this->updateCourse($id, $coursecode, $coursename, $progression, $syllabus);
        return true;
    }

    // Funktion för att radera kurs
    public function deleteContr($id) {
        // Flyttar data
        $this->deleteCourse($id);
        return true;
    }
}