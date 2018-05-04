<?php

namespace Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;

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
    private $profileurl;

    /** @var \DateTimeInterface */
    private $lastlogin;

    /** @var \DateTimeInterface */
    private $creationdate;

    /** @var Commission[] */
    private $commissions;

    public function __construct(
        string $email,
        string $password,
        string $name,
        string $profileurl,
        \DateTimeInterface $lastlogin,
        \DateTimeInterface $creationdate
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->profileurl = $profileurl;
        $this->lastlogin = $lastlogin;
        $this->creationdate = $creationdate;
        $this->commissions = new ArrayCollection();
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
        return $this->profileurl;
    }

    public function setProfileUrl(string $profileurl): void
    {
        $this->profileurl = $profileurl;
    }

    public function getLastLogin(): \DateTimeInterface
    {
        return $this->lastlogin;
    }

    public function setLastLogin(\DateTimeInterface $lastlogin): void
    {
        $this->lastlogin = $lastlogin;
    }

    public function getCreationDate(): \DateTimeInterface
    {
        return $this->creationdate;
    }

    public function setCreationDate(\DateTimeInterface $creationdate): void
    {
        $this->creationdate = $creationdate;
    }

    /**
     * @param Commission[] $commissions
     */
    public function setCommissions(array $commissions): void
    {
        $this->commissions = $commissions;
    }

    /**
     * @return Commission[]
     */
    public function getCommissions(): array
    {
        return $this->commissions->toArray();
    }
}