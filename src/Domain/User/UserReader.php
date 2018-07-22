<?php

namespace App\Domain\User;

interface UserReader
{
    /** @return UserCollection */
    public function read() : UserCollection;
}