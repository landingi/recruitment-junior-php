<?php
declare(strict_types=1);

namespace Tests\Unit\Domain\User;

use PHPUnit\Framework\TestCase;
use RecruitmentApp\Domain\User\ApiKey;

class ApiKeyTest extends TestCase
{
    public function testGeneratesUniqueApiKeys(): void
    {
        $this->assertNotEquals((string) ApiKey::generate(), (string) ApiKey::generate());
    }
}
