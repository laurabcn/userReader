<?php

namespace App\Infrastructure\User;

use App\Domain\User\UserCollection;

class UserTransformer
{
    public static function transform(UserCollection $userCollection)
    {
        $response = [];

        foreach ($userCollection as $user) {
            $response[] = [
                'name' => $user->name(),
                'email' => $user->email(),
                'phone' => $user->phone(),
                'company' => $user->company()
            ];
        }

        return $response;
    }
}