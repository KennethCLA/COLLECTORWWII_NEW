<?php
// src/business/user_service.php

namespace Business;

use Data\UserDAO;

class UserService
{
    private $userDao;

    public function __construct(UserDAO $userDao)
    {
        $this->userDao = $userDao;
    }

    public function login($gebruikersnaam, $wachtwoord)
    {
        $gebruiker = $this->userDao->getUser($gebruikersnaam);

        if ($gebruiker && password_verify($wachtwoord, $gebruiker['wachtwoord'])) {
            return $gebruiker;
        }

        return null;
    }
}