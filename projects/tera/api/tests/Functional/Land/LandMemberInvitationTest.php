<?php

namespace App\Tests\Functional\Land;

use App\Repository\LandMemberInvitationRepository;
use App\Repository\LandMemberRepository;
use App\Tests\Utils\Abstract\AbstractApiTestCase;
use App\Workflow\LandMemberInvitation\LandMemberInvitationWorkflowPlace;
use App\Workflow\LandMemberInvitation\LandMemberInvitationWorkflowTransition;
use function Zenstruck\Foundry\faker;

class LandMemberInvitationTest extends AbstractApiTestCase
{
    public function testAccept()
    {
        $context = $this->createLandContext();
        $invited = $this->createPerson();
        $this->addOneLandRole($context);
        $this->addOneLandMemberInvitation($context, [$context->landRoles[0]], $invited->getEmail());

        $this->browser()->actingAs($invited)
            ->patch(
                $this->getIriFromResource($context->landMemberInvitations[0]) . '/' . LandMemberInvitationWorkflowTransition::ACCEPT,
                ['json' => []])
            ->assertSuccessful();

        $landMemberRepository = static::getContainer()->get(LandMemberRepository::class);
        $landMember = $landMemberRepository->findOneBy(['person' => $invited->_real(), 'land' => $context->land->_real()]);

        $this->assertNotNull($landMember);
        $this->assertArrayIsEqualToArrayIgnoringListOfKeys($landMember->getLandRoles()->toArray(), $context->landMemberInvitations[0]->getLandRoles()->toArray(), []);

        $landMemberInvitationRepository = static::getContainer()->get(LandMemberInvitationRepository::class);
        $landMemberInvitation = $landMemberInvitationRepository->findOneBy(['person' => $invited->_real(), 'land' => $context->land->_real(), 'state' => LandMemberInvitationWorkflowPlace::ACCEPTED]);

        $this->assertNotNull($landMemberInvitation);
        $this->assertNotNull($landMemberInvitation->getAcceptedAt());
        $this->assertNull($landMemberInvitation->getRefusedAt());
    }

    public function testAutoLink()
    {
        $context = $this->createLandContext();
        $invited = $this->createPerson();
        $this->addOneLandRole($context);
        $this->addOneLandMemberInvitation($context, [$context->landRoles[0]], $invited->getEmail());

        $landMemberInvitationRepository = static::getContainer()->get(LandMemberInvitationRepository::class);
        $landMemberInvitation = $landMemberInvitationRepository->findOneBy(['person' => $invited->_real(), 'land' => $context->land->_real(), 'state' => LandMemberInvitationWorkflowPlace::PENDING]);

        $this->assertNotNull($landMemberInvitation);

        $email = faker()->email();
        $this->addOneLandMemberInvitation($context, [$context->landRoles[0]], $email);

        $landMemberInvitation = $landMemberInvitationRepository->findOneBy(['land' => $context->land->_real(), 'state' => LandMemberInvitationWorkflowPlace::PENDING, 'person' => null]);
        $this->assertNotNull($landMemberInvitation);

        $invited = $this->createPerson(['email' => $email]);
        $landMemberInvitation = $landMemberInvitationRepository->findOneBy(['land' => $context->land->_real(), 'state' => LandMemberInvitationWorkflowPlace::PENDING, 'person' => $invited->_real()]);
        $this->assertNotNull($landMemberInvitation);
    }

    public function testRefuse()
    {
        $context = $this->createLandContext();
        $invited = $this->createPerson();
        $this->addOneLandMemberInvitation($context, null, $invited->getEmail());

        $this->browser()->actingAs($invited)
            ->patch(
                $this->getIriFromResource($context->landMemberInvitations[0]) . '/' . LandMemberInvitationWorkflowTransition::REFUSE,
                ['json' => []])
            ->assertSuccessful();

        $landMemberRepository = static::getContainer()->get(LandMemberRepository::class);
        $landMember = $landMemberRepository->findOneBy(['person' => $invited->_real(), 'land' => $context->land->_real()]);

        $this->assertNull($landMember);

        $landMemberInvitationRepository = static::getContainer()->get(LandMemberInvitationRepository::class);
        $landMemberInvitation = $landMemberInvitationRepository->findOneBy(['id' => $context->landMemberInvitations[0]->getId(), 'land' => $context->land->_real(), 'state' => LandMemberInvitationWorkflowPlace::REFUSED]);

        $this->assertNotNull($landMemberInvitation);
        $this->assertNotNull($landMemberInvitation->getRefusedAt());
        $this->assertNull($landMemberInvitation->getAcceptedAt());
    }
}
