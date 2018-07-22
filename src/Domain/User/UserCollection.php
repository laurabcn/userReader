<?php

namespace App\Domain\User;

class UserCollection implements \Countable, \IteratorAggregate
{
    /** @var User[] */
    private $users = [];

    public function add(User $user): self
    {
        $this->users[] = $user;

        return $this;
    }

    public function users(): array
    {
        return $this->users;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->users);
    }

    public function count()
    {
        return count($this->users);
    }

    public function addUsers(UserCollection $users): array
    {
        foreach ($users as $user){
           $this->users[] = $user;
       }
       return $this->users();
    }
}