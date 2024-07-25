<?php
// tests/test_user_dao.php

require_once __DIR__ . '/../src/data/user_dao.php';

$userDao = new UserDAO();

// Insert a new user
$userDao->insertUser('John Doe', 'john@example.com');

// Get all users
$users = $userDao->getAllUsers();
print_r($users);

// Get a user by ID
$user = $userDao->getUserById(1);
print_r($user);

// Update a user
$userDao->updateUser(1, 'Jane Doe', 'jane@example.com');

// Delete a user
$userDao->deleteUser(1);

// Get all users after deletion
$users = $userDao->getAllUsers();
print_r($users);
?>
