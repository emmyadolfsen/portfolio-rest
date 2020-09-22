<?php

class Courses extends Dbh {


    // Hämtar specifik data från databas med specifikt id 
    protected function getCourse($id) {
        $sql = "SELECT * FROM courses WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    // Hämta all data från courses i databasen
    public function getCourses() {
        $sql = "SELECT * FROM courses";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // Får data från createCourse och lägger till i databas
    protected function setCourse($coursecode, $coursename, $progression, $syllabus) {
        $sql = "INSERT INTO courses(course_code, course_name, progression, syllabus) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$coursecode, $coursename, $progression, $syllabus]);
        return true;
    }

    // Får data från updateContr och uppdaterar i databas
    protected function updateCourse($id, $coursecode, $coursename, $progression, $syllabus) {
        $sql = "UPDATE courses SET course_code = '$coursecode', course_name = '$coursename', progression = '$progression', syllabus = '$syllabus' WHERE id = $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $coursecode, $coursename, $progression, $syllabus]);
        return true;
    }

    // Data från deleteContr - skickar med id för delete i databas
    protected function deleteCourse($id) {
        $sql = "DELETE FROM courses WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

}