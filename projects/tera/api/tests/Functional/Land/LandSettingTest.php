<?php

namespace App\Tests\Functional\Land;

use App\Security\Constant\LandSettingPermission;
use App\Tests\Utils\Abstract\AbstractApiTestCase;

class LandSettingTest extends AbstractApiTestCase
{
    public function testGet()
    {
        $context = $this->createLandContext();

        $landSetting = $context->land->getLandSetting();
        // Owner
        $this->browser()->actingAs($context->owner)
            ->get($this->getIriFromResource($landSetting))
            ->assertSuccessful()
            ->assertJsonMatches('ulid', $landSetting->getUlid()->toString())
            ->assertJsonMatches('lookingForMember', $landSetting->isLookingForMember());

        // Member with permissions
        $landRole = $this->createLandRole($context->land, [LandSettingPermission::READ]);
        $this->addLandMember($context, [$landRole]);

        $this->browser()->actingAs($context->landMembers[0]->getPerson())
            ->get($this->getIriFromResource($landSetting))
            ->assertSuccessful()
            ->assertJsonMatches('ulid', $landSetting->getUlid()->toString())
            ->assertJsonMatches('lookingForMember', $landSetting->isLookingForMember());
    }

    public function testPatch()
    {
        $context = $this->createLandContext();

        $landSetting = $context->land->getLandSetting();
        // Owner
        $this->browser()->actingAs($context->owner)
            ->patch($this->getIriFromResource($landSetting), ['json' => [
                'lookingForMember' => true
            ]])
            ->assertSuccessful()
            ->assertJsonMatches('ulid', $landSetting->getUlid()->toString())
            ->assertJsonMatches('lookingForMember', true);

        // Member with permissions
        $landRole = $this->createLandRole($context->land, [LandSettingPermission::UPDATE]);
        $this->addLandMember($context, [$landRole]);

        $this->browser()->actingAs($context->landMembers[0]->getPerson())
            ->patch($this->getIriFromResource($landSetting), ['json' => [
                'lookingForMember' => false
            ]])
            ->assertSuccessful()
            ->assertJsonMatches('ulid', $landSetting->getUlid()->toString())
            ->assertJsonMatches('lookingForMember', false);
    }
}
