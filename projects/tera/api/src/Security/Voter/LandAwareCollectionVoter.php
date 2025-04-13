<?php

namespace App\Security\Voter;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\IriConverterInterface;
use App\Entity\Land;
use App\Security\Constant\Permissions;
use App\Security\Interface\LandAwareInterface;
use App\Security\Service\PermissionManager;
use JetBrains\PhpStorm\Deprecated;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

#[Deprecated]
class LandAwareCollectionVoter extends Voter
{

    private ?Request $currentRequest = null;

    public function __construct(private readonly RequestStack $requestStack, private readonly IriConverterInterface $iriConverter, private readonly PermissionManager $permissionManager)
    {
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        $attributeIsSupported = in_array($attribute, Permissions::LAND_MEMBER_RELATED);

        $this->currentRequest = $this->requestStack->getCurrentRequest();

        $hasLandQueryParameter = $this->currentRequest->query->has('land');

        if (!$this->currentRequest->attributes->has('_api_operation')) {
            return false; //Mandatory for other calls to work (e.g. /api/docs)
        }

        $operation = $this->currentRequest->attributes->get('_api_operation');
        $isGetCollection = $operation instanceof GetCollection;

        if (!$this->currentRequest->attributes->has('_api_resource_class')) {
            return false; //Mandatory for other calls to work (e.g. /api/docs)
        }

        $subjectsAreLandAware = in_array(LandAwareInterface::class, class_implements($this->currentRequest->attributes->get('_api_resource_class')));

        return $subjectsAreLandAware && $attributeIsSupported && $hasLandQueryParameter && $isGetCollection;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $landIri = $this->currentRequest->query->get('land');
        $land = $this->iriConverter->getResourceFromIri($landIri);

        if (!$land instanceof Land) {
            return false;
        }

        return $this->permissionManager->can($attribute, $land);
    }
}
