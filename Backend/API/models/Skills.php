<?php


class Skills {

    //db config
    private $conn;

    public $skill_id;
    public $skill;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    function create() {
        $query = 'INSERT INTO skills (skill) VALUES (?)';

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->skill]);
        $this->skill_id = $this->conn->lastInsertId();

        return $stmt;
    }

}