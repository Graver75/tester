<?php


class Skill {

    //db config
    private $conn;

    public $skill_id;
    public $skill;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    function query() {
        $query = 'SELECT * FROM skills';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $this->skill_id = $this->conn->lastInsertId();

        return $stmt;
    }

    function create() {
        $query = 'INSERT INTO skills (skill) VALUES (?)';

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->skill]);
        $this->skill_id = $this->conn->lastInsertId();

        return $stmt;
    }

    function update() {
        $query = 'UPDATE skills SET skill = ' . $this->skill . 'WHERE skill_id = ' . $this->skill_id;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

}