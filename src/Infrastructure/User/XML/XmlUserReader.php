<?php

namespace App\Infrastructure\User\XML;

use App\Domain\User\User;
use App\Domain\User\UserCollection;
use App\Domain\User\UserReader as UserRead;


class XmlUserReader implements UserRead
{
    /** @var string */
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /** @return UserCollection
     * @throws \Exception
     */
    public function read(): UserCollection
    {
        if (!file_exists($this->path)) {
            throw new \Exception('File unavailable: ' . $this->path);
        }

        $xml = new \SimpleXMLElement(file_get_contents($this->path));

        $users = new UserCollection();

        foreach ($xml as $xmlEntry) {
            $user = new User(
                (string) $xmlEntry->attributes()->name,
                (string) $xmlEntry,
                (string) $xmlEntry->attributes()->phone,
                (string) $xmlEntry->attributes()->company
            );
            $users->add($user);
        }

        return $users;
    }
}