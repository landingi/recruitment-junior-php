<?php
declare(strict_types=1);

namespace RecruitmentApp\Domain;

use Doctrine\ORM\Mapping as ORM;
use RecruitmentApp\Domain\Email\Exception\InvalidEmail;

/**
 * @ORM\Embeddable
 */
class Email
{
    /**
     * @ORM\Column(type = "string")
     */
    private string $email;

    /**
     * @throws InvalidEmail
     */
    public function __construct(string $email)
    {
        if (empty($email) || false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmail(sprintf('Invalid email: "%s"', $email));
        }

        $this->email = $email;
    }

    public function __toString()
    {
        return $this->email;
    }
}
