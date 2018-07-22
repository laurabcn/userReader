<?php

namespace App\Infrastructure\User\Json;

use App\Domain\User\User;
use App\Domain\User\UserCollection;
use App\Domain\User\UserReader as UserRead;
use GuzzleHttp\Client;

class JsonUserReader implements UserRead
{
    /** @var string */
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /** @return UserCollection */
    public function read(): UserCollection
    {
        $data = file_get_contents($this->path);
        $data = json_decode($data, true);

        $users = new UserCollection();

        foreach ($data as $user) {
            $user = new User(
                $user['name'],
                $user['email'],
                $user['phone'],
                $user['company']['name']
            );
            $users->add($user);
        }

        return $users;
    }
}