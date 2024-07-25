<?php
// src/business/item_service.php

namespace Business;

use Data\ItemDAO;

class ItemService
{
    private ItemDAO $itemDAO;

    public function __construct(ItemDAO $itemDAO)
    {
        $this->itemDAO = $itemDAO;
    }
}