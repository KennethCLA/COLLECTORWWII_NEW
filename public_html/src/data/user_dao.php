<?php
// src/data/user_dao.php

require_once 'base_dao.php';

class UserDAO extends BaseDAO {
    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        return $this->executeQuery($sql);
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        return $this->executeQuery($sql, [$id]);
    }

    public function insertUser($name, $email) {
        $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
        return $this->executeUpdate($sql, [$name, $email]);
    }

    public function updateUser($id, $name, $email) {
        $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";
        return $this->executeUpdate($sql, [$name, $email, $id]);
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = ?";
        return $this->executeUpdate($sql, [$id]);
    }
}