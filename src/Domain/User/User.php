<?php

namespace App\Domain\User;

final class User
{
    /** @var string */
    private $name;

    /** @var string */
    private $email;

    /** @var int */
    private $phone;

    /** @var string */
    private $company;

    public function __construct(string $name, string $email, string $phone, string $company)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->company = $company;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function phone(): string
    {
        return $this->phone;
    }

    public function company(): string
    {
        return $this->company;
    }
}