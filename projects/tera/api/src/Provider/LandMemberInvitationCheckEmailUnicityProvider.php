<?php

namespace App\Provider;

use ApiPlatform\Metadata\IriConverterInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Dto\LandMemberInvitationCheckEmailUnicityDto;
use App\Repository\LandMemberInvitationRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final readonly class LandMemberInvitationCheckEmailUnicityProvider implements ProviderInterface
{
    public function __construct(
        private LandMemberInvitationRepository $landMemberInvitationRepository,
        private IriConverterInterface          $iriConverter,
    )
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $email = $context['filters']['email'] ?? null;
        $landIri = $context['filters']['land'] ?? null;

        if (!$email || !$landIri) {
            throw new BadRequestHttpException('Email and land are required.');
        }

        $land = $this->iriConverter->getResourceFromIri($landIri);
        if (!$land) {
            throw new BadRequestHttpException('Land not found.');
        }

        $existingInvitation = $this->landMemberInvitationRepository->findOneBy([
            'email' => $email,
            'land' => $land,
        ]);

        return new LandMemberInvitationCheckEmailUnicityDto(!$existingInvitation);
    }
}
