<?php

namespace Pages;

use Infrastructure\Session;

abstract class Controller
{
    public function isAllowAccess(): bool
    {
        return Session::current()->isLoggedIn();
    }
}
