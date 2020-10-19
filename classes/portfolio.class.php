<?php

class Portfolio extends Dbh {

    // Hämtar objekt med specifikt id från databastabell
    protected function getObject($id, $table_name) {
        $sql = "SELECT * FROM $table_name WHERE id = $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    // Hämta alla objekt från databastabell
    public function getObjects($table_name) {
        $sql = "SELECT * FROM $table_name";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // Lägg till nytt objekt i databastabell
    protected function setObject($sql_insert) {
        $sql = "INSERT INTO $sql_insert";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return true;
    }

    // Uppdatera objekt i databastabell
    protected function updateObject($table_name, $sql_set) {
        $sql = "UPDATE $table_name SET $sql_set";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return true;
    }

    // Radera objekt i databastabell
    protected function deleteObject($id, $table_name) {
        $sql = "DELETE FROM $table_name WHERE id = '$id'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

}
?>