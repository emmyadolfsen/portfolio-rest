<?php

class Work extends Dbh {


    // Hämtar specifik data från databas med specifikt id 
    protected function getWork($id) {
        $sql = "SELECT * FROM work WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    // Hämta all data från work i databasen
    public function getAllWork() {
        $sql = "SELECT * FROM work";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // Får data från createWork och lägger till i databas
    protected function setWork($work_name, $work_place, $work_title, $work_date) {
        $sql = "INSERT INTO work(work_name, work_place, work_title, work_date) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$work_name, $work_place, $work_title, $work_date]);
        return true;
    }

    // Får data från updateContr och uppdaterar i databas
    protected function updateWork($id, $work_name, $work_place, $work_title, $work_date) {
        $sql = "UPDATE work SET work_name = '$work_name', work_place = '$work_place', work_title = '$work_title', work_date = '$work_date' WHERE id = $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $work_name, $work_place, $work_title, $work_date]);
        return true;
    }

    // Data från deleteWorkContr - skickar med id för delete i databas
    protected function deleteWork($id) {
        $sql = "DELETE FROM work WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

}