<?php

namespace Domain\Model;

class User
{
    /** @var int */
    private $id;

    /** @var string */
    private $email;

    /** @var string */
    private $password;

    /** @var string */
    private $name;

    /** @var string */
    private $profileUrl;

    /** @var \DateTimeInterface */
    private $lastLogin;

    /** @var \DateTimeInterface */
    private $creationDate;

    public function __construct(
        string $email,
        string $password,
        string $name,
        string $profileUrl,
        \DateTimeInterface $lastLogin,
        \DateTimeInterface $creationDate
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->profileUrl = $profileUrl;
        $this->lastLogin = $lastLogin;
        $this->creationDate = $creationDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getProfileUrl(): string
    {
        return $this->profileUrl;
    }

    public function setProfileUrl(string $profileUrl): void
    {
        $this->profileUrl = $profileUrl;
    }

    public function getLastLogin(): \DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(\DateTimeInterface $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    public function getCreationDate(): \DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): void
    {
        $this->creationDate = $creationDate;
    }
}