<?php


class Employee {

    // db config
    private $conn;

    public $employee_id;
    public $first_name;
    public $last_name;
    public $age;
    public $exp;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    // all
    function query() {
        $query = 'SELECT first_name, last_name, age, exp, GROUP_CONCAT(skill SEPARATOR ", ") AS skills
                  FROM emps_skls
                  JOIN employees USING (employee_id)
                  JOIN skills USING (skill_id)
                  GROUP BY first_name, last_name, age, exp';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // by field
    function query_by_field($field, $value) {
        $query = 'SELECT first_name, last_name, age, exp, GROUP_CONCAT(skill SEPARATOR ", ") AS skills
                  FROM emps_skls
                  JOIN employees USING (employee_id)
                  JOIN skills USING (skill_id)
                  WHERE ' . $field . ' = ' . $value .
                ' GROUP BY first_name, last_name, age, exp';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function create() {
        $query = 'INSERT INTO employees (first_name, last_name, age, exp) VALUES (?, ?, ?, ?)';

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->first_name, $this->last_name, $this->age, $this->exp]);
        $this->employee_id = $this->conn->lastInsertId();

        return $stmt;
    }

}