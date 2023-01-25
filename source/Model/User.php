<?php

namespace Source\Model;

use Source\Core\Model;

class User extends Model
{
    public function __construct()
    {
        parent::__construct('users', ['id'], ['']);
    }

    /**
     * @param string $email
     * @return array|mixed|Model|null
     */
    public function findByEmail(string $email)
    {
        $find = $this->find("email= :mail","mail={$email}");
        return $find->fetch();
    }
}

