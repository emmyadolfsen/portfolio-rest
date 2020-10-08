<?php

class Courses extends Dbh {


    // Hämtar specifik data från databas med specifikt id 
    protected function getCourse($id) {
        $sql = "SELECT * FROM courses_read WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    // Hämta all data från courses i databasen
    public function getCourses() {
        $sql = "SELECT * FROM courses_read";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // Får data från createCourse och lägger till i databas
    protected function setCourse($university, $course_name, $course_date) {
        $sql = "INSERT INTO courses_read(university, course_name, course_date) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$university, $course_name, $course_date]);
        return true;
    }

    // Får data från updateContr och uppdaterar i databas
    protected function updateCourse($id, $university, $course_name, $course_date) {
        $sql = "UPDATE courses_read SET university = '$university', course_name = '$course_name', course_date = '$course_date' WHERE id = $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $university, $course_name, $course_date]);
        return true;
    }

    // Data från deleteContr - skickar med id för delete i databas
    protected function deleteCourse($id) {
        $sql = "DELETE FROM courses_read WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

}