<?php
declare(strict_types=1);

namespace Tests\Unit\Domain;

use PHPUnit\Framework\TestCase;
use RecruitmentApp\Domain\Email;
use RecruitmentApp\Domain\Email\Exception\InvalidEmail;

class EmailTest extends TestCase
{
    public function testEmptyEmailIsInvalid(): void
    {
        $this->expectException(InvalidEmail::class);
        $this->expectExceptionMessage('Invalid email: ""');
        new Email('');
    }

    public function testEmailWithTwoAtSignsIsInvalid(): void
    {
        $this->expectException(InvalidEmail::class);
        $this->expectExceptionMessage('Invalid email: "example@example.com@example.com"');
        new Email('example@example.com@example.com');
    }

    public function testEmailWithMissingRecipientIsInvalid(): void
    {
        $this->expectException(InvalidEmail::class);
        $this->expectExceptionMessage('Invalid email: "@example.com"');
        new Email('@example.com');
    }

    public function testEmailWithoutDomainAndTopLevelDomainIsInvalid(): void
    {
        $this->expectException(InvalidEmail::class);
        $this->expectExceptionMessage('Invalid email: "example@"');
        new Email('example@');
    }

    public function testEmailWithMissingTopLevelDomainIsInvalid(): void
    {
        $this->expectException(InvalidEmail::class);
        $this->expectExceptionMessage('Invalid email: "example@example"');
        new Email('example@example');
    }

    public function testEmailWithMissingDomainIsInvalid(): void
    {
        $this->expectException(InvalidEmail::class);
        $this->expectExceptionMessage('Invalid email: "example@.com"');
        new Email('example@.com');
    }
}
