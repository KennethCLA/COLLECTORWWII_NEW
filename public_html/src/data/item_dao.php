<?php
// src/data/item_dao.php

namespace Data;

use Data\DBConfig;

class ItemDAO extends DBConfig
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