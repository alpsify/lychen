<?php

namespace App\Workflow\LandMemberInvitation\Subscriber;

use App\Entity\LandMemberInvitation;
use App\Service\Land\LandMemberInvitationManager;
use App\Workflow\LandMemberInvitation\LandMemberInvitationWorkflow;
use App\Workflow\LandMemberInvitation\LandMemberInvitationWorkflowTransition;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\Event;
use Symfony\Component\Workflow\Event\TransitionEvent;

readonly class LandMemberInvitationTransitionRefuse implements EventSubscriberInterface
{
    public function __construct(private LandMemberInvitationManager $landMemberInvitationManager, private EntityManagerInterface $entityManager)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            TransitionEvent::getName(LandMemberInvitationWorkflow::NAME, LandMemberInvitationWorkflowTransition::REFUSE) => [['onTransition', 0]],
        ];
    }

    public function onTransition(Event $event): void
    {
        /** @var LandMemberInvitation $landMemberInvitation */
        $landMemberInvitation = $event->getSubject();

        $landMemberInvitation->setRefusedAt(new DateTimeImmutable());
    }
}
