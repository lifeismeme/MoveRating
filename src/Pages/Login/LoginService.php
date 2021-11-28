<?php

namespace Pages\Login;

use Exception;
use Models\Repositories\UserRepository;
use Models\User;

class LoginService
{
    private UserRepository $userRepos;
    public function __construct()
    {
        $this->userRepos = new UserRepository();
    }

    public function getUser(string $id, string $password): ?User
    {
        $user = $this->userRepos->getUser($id, $password);

        return $user;
    }

    public function addUser(string $id, string $password): User
    {
        if(strlen($password) < 6)
            throw new Exception("password is too short");

        $id = trim($id);
        if($id === '')
            throw new Exception('username is empty');

        $isUserIdExists = $this->userRepos->hasId($id);
        if($isUserIdExists)
            throw new Exception("username $id exists");

            
        $user = $this->userRepos->addUser($id, $password);

        return $user;
    }
}
