<?php


class Employee {

    // db config
    private $conn;
    private $table_name = 'employees';

    public $id;
    public $first_name;
    public $last_name;
    public $age;
    public $exp;

    public function __construct($db) {
        $this->conn = $db;
    }

}