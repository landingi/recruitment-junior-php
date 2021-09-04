<?php
declare(strict_types=1);

namespace RecruitmentApp\Domain\User;

use Symfony\Component\Uid\Uuid;

class ApiKey
{
    private string $key;

    public static function generate(): ApiKey
    {
        return new self((string) Uuid::v4());
    }

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function __toString(): string
    {
        return $this->key;
    }
}
