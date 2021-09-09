<?php
declare(strict_types=1);

namespace RecruitmentApp\Framework\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use RecruitmentApp\Domain\Email;
use RecruitmentApp\Domain\User;
use RecruitmentApp\Domain\User\ApiKey;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UsersController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route(path: '/users', name: 'index', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $this->entityManager->persist(
            $user = new User(
                new Email($request->get('email')),
                ApiKey::generate()
            )
        );
        $this->entityManager->flush();

        return new JsonResponse($user);
    }
}
