<?php

namespace Models;

class User
{
    public function __construct()
    {
    }
    public string $id;
    public string $passhash;
    public int $accountType;

    public static int $AccountType_Member = 1;
    public static int $AccountType_Admin = 2;
}
