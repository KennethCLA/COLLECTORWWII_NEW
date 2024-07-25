<?php
// src/business/book_service.php

namespace Business;

use Data\BookDAO;

class BookService
{
    private $bookDAO;

    public function __construct(BookDAO $bookDAO)
    {
        $this->bookDAO = $bookDAO;
    }
}