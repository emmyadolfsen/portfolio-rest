<?php

class Projects extends Dbh {


    // Hämtar specifik data från databas med specifikt id 
    protected function getProject($id) {
        $sql = "SELECT * FROM myprojects WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    // Hämta all data från work i databasen
    public function getProjects() {
        $sql = "SELECT * FROM myprojects";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // Får data från createWork och lägger till i databas
    protected function setProject($project_name, $project_url, $project_d) {
        $sql = "INSERT INTO myprojects(project_name, project_url, project_d) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$project_name, $project_url, $project_d]);
        return true;
    }

    // Får data från updateContr och uppdaterar i databas
    protected function updateProject($id, $project_name, $project_url, $project_d) {
        $sql = "UPDATE myprojects SET project_name = '$project_name', project_url = '$project_url', project_d = '$project_d' WHERE id = $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $project_name, $project_url, $project_d]);
        return true;
    }

    // Data från deleteWorkContr - skickar med id för delete i databas
    protected function deleteProject($id) {
        $sql = "DELETE FROM myprojects WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

}