<?php
declare(strict_types=1);

namespace RecruitmentApp\Framework\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GenericController
{
    #[Route(path: '/', name: 'index')]
    public function index(): Response
    {
        return new JsonResponse(['ok']);
    }
}
