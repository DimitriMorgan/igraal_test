<?php

namespace Domain\Model;

class Commission
{
    /** @var int */
    private $id;

    /** @var \DateTimeInterface */
    private $date;

    /** @var float */
    private $cashback;

    /** @var User */
    private $idUser;

    public function __construct(\DateTimeInterface $date, float $cashback, User $idUser)
    {
        $this->date = $date;
        $this->cashback = $cashback;
        $this->idUser = $idUser;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    public function getCashback(): float
    {
        return $this->cashback;
    }

    public function setCashback(float $cashback): void
    {
        $this->cashback = $cashback;
    }

    public function getUser(): User
    {
        return $this->idUser;
    }

    public function setUser(User $idUser): void
    {
        $this->idUser = $idUser;
    }
}