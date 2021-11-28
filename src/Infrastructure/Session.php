<?php

namespace Infrastructure;

use Models\User;

class Session
{
    private ?User $user;

    public static function current(): Session
    {
        if (array_key_exists('user', $_SESSION) === true)
            return new Session($_SESSION['user']);
        else
            return new Session();
    }

    public static function initSession(User $user): Session
    {
        $_SESSION['user'] = $user;
        return new Session($user);
    }

    private function __construct(?User $user = null)
    {
        $this->user = $user;
    }

    public function isLoggedIn(): bool
    {
        return isset($this->user) && $this->user !== null;
    }

    public function getCurrentUser(): ?User
    {
        return $this->user;
    }

    public function endSession()
    {
        unset($this->user);
        unset($_SESSION['user']);
        session_unset();
    }
}
