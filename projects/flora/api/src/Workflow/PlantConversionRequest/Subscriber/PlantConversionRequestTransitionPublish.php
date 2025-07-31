<?php

namespace App\Workflow\PlantConversionRequest\Subscriber;

use App\Entity\PlantConversionRequest;
use App\Service\Plant\PlantConverter;
use App\Workflow\PlantConversionRequest\PlantConversionRequestWorkflowTransition;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\Event;

class PlantConversionRequestTransitionPublish implements EventSubscriberInterface
{
    public function __construct(private readonly PlantConverter $convertCustomToGlobal)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'workflow.plant_conversion_request.transition.' . PlantConversionRequestWorkflowTransition::PUBLISH => 'onTransition',
        ];
    }

    public function onTransition(Event $event): void
    {
        /** @var PlantConversionRequest $plantConversionRequest */
        $plantConversionRequest = $event->getSubject();

        if ($plantConversionRequest->getMergeCandidate()) {
            $this->convertCustomToGlobal->migrateData($plantConversionRequest->getPlantCustom(), $plantConversionRequest->getMergeCandidate());
            return;
        }

        $this->convertCustomToGlobal->convertToGlobal($plantConversionRequest->getPlantCustom());
    }
}
