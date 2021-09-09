<?php
declare(strict_types=1);

namespace Tests\Application;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsersControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    protected function setUp(): void
    {
        $this->client = self::createClient();
    }

    public function testCreateUser(): void
    {
        $this->client->request(
            method: 'POST',
            uri: '/users',
            server: [],
            content: json_encode(['email' => 'email@domain.com'], JSON_THROW_ON_ERROR),
        );
        self::assertResponseIsSuccessful();
    }
}
