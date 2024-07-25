<?php
// src/data/book_dao.php

namespace Data;

use Data\DBConfig;

class BookDAO extends DBConfig
{
    private \PDO $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->getConfigCollectorWWII();
    }

    public function getDb(): \PDO
    {
        return $this->db;
    }
}