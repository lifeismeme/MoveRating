<?php

namespace Models\Repositories;

use Models\User;
use Models\Repositories\Repository;

class UserRepository extends Repository
{
    public function __construct()
    {
    }

    private function getPassHash(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function getUser(string $id, string $password): ?User
    {
        $con = $this->getConnection();

        $sql = 'select * from `user` where `id` = ?';

        $stmt = $con->prepare($sql);
        $stmt->execute([$id]);
        if (($r = $stmt->fetch()) !== false) {
            if (password_verify($password, $r['passHash']) === true) {
                $user = new User();
                $user->id = $r['id'];
                $user->passhash = $r['passHash'];
                $user->accountType = $r['accountType'];

                return $user;
            }
        }

        return null;
    }

    public function hasId(string $id): bool
    {
        $con = $this->getConnection();

        $sql = 'select id from `user` where id = ?';

        $stmt = $con->prepare($sql);
        $stmt->execute([$id]);
        if (($r = $stmt->fetch()) !== false) {
            return true;
        }

        return false;
    }

    public function addUser(string $id, string $password): User
    {
        $con = $this->getConnection();

        $sql = 'insert into `user`(id,passhash,accountType) value(?,?,?)';

        $stmt = $con->prepare($sql);
        $passhash = $this->getPassHash($password);
        if ($stmt->execute([$id, $passhash, 1]) === true) {
            $user = new User();
            $user->id = $id;
            $user->passhash = $passhash;
            $user->accountType = 1;

            return $user;
        }

        return null;
    }
}
