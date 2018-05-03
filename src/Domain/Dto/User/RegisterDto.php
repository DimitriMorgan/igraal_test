<?php

namespace Domain\Dto\User;


class RegisterDto
{
    /** @var string */
    public $email;

    /** @var string */
    public $password;

    /** @var string */
    public $name;

    /** @var string */
    public $profileUrl;

    /** @var \DateTimeInterface */
    public $lastLogin;

    /** @var \DateTimeInterface */
    public $creationDate;
}