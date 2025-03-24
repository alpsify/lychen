<template>
  <Card
    class="p-4 gap-2 flex flex-row justify-between items-center"
    hoverable
  >
    <div class="flex flex-col gap-1">
      <p class="font-medium">{{ landMemberInvitation.email }}</p>
      <div
        v-if="landRoles"
        class="flex flex-row gap-2"
      >
        <BadgeTeraLandRole
          v-for="(item, index) in landRoles"
          :key="index"
          :land-role="item"
        />
      </div>
    </div>
    <BadgeTeraLandMemberInvitation
      v-if="landMemberInvitation.state"
      :state="landMemberInvitation.state"
    />
    <div class="flex flex-row gap-2">
      <DialogTeraLandMemberInvitationDelete :land-member-invitation="landMemberInvitation">
        <Button
          :icon="faTrash"
          variant="negative"
          size="sm"
          @click.stop
        />
      </DialogTeraLandMemberInvitationDelete>
      <template v-if="variant === VARIANT.ForUser">
        <Button
          :icon="faCheck"
          variant="positive"
          size="sm" />
        <Button
          :icon="faTimes"
          variant="negative"
          size="sm"
      /></template>
    </div>
  </Card>
</template>

<script setup lang="ts">
import Card from '@lychen/vue-ui-components-core/card/Card.vue';
import BadgeTeraLandRole from '../../land-role/badge/BadgeTeraLandRole.vue';
import DialogTeraLandMemberInvitationDelete from '../dialogs/delete/DialogTeraLandMemberInvitationDelete.vue';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { faTrash } from '@fortawesome/pro-light-svg-icons/faTrash';
import { faCheck } from '@fortawesome/pro-light-svg-icons/faCheck';
import { faTimes } from '@fortawesome/pro-light-svg-icons/faTimes';
import { VARIANT, type Variant } from '.';
import BadgeTeraLandMemberInvitation from '../badge/BadgeTeraLandMemberInvitation.vue';
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';

const { variant = VARIANT.Settings } = defineProps<{
  variant?: Variant;
  landMemberInvitation: Pick<
    components['schemas']['LandMemberInvitation.jsonld'],
    'email' | 'state'
  >;
  landRoles?: Pick<components['schemas']['LandRole.jsonld'], 'name'>[];
}>();
</script>
