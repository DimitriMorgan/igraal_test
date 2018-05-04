<?php

namespace Domain\Dto\User;

class CommissionDetailsDto
{
    /** @var float */
    public $cashBack;

    /** @var string */
    public $date;

    public function __construct(float $cashBack, string $date)
    {
        $this->cashBack = $cashBack;
        $this->date = $date;
    }
}