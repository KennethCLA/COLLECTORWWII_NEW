<?php
// src/data/base_dao.php

require_once 'db_config.php';

class BaseDAO {
    protected $connection;

    public function __construct() {
        $this->connection = get_db_connection();
    }

    protected function executeQuery($sql, $params = []) {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    protected function executeUpdate($sql, $params = []) {
        try {
            $stmt = $this->connection->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
}