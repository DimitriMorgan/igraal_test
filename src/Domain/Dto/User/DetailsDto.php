<?php

namespace Domain\Dto\User;

class DetailsDto
{
    /** @var string */
    public $email;

    /** @var string */
    public $name;

    /** @var string */
    public $profileUrl;

    /** @var string */
    public $lastLogin;

    /** @var string */
    public $creationDate;

    /** @var CommissionDetailsDto[] */
    public $commissionsDetailDto;

    public function __construct(
        string $email,
        string $name,
        string $profileUrl,
        string $lastLogin,
        string $creationDate,
        array $commissionsDetailDto
    ) {
        $this->email = $email;
        $this->name = $name;
        $this->profileUrl = $profileUrl;
        $this->lastLogin = $lastLogin;
        $this->creationDate = $creationDate;
        $this->commissionsDetailDto = $commissionsDetailDto;
    }
}