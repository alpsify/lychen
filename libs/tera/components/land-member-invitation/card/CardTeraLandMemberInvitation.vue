<template>
  <Card
    class="p-4 gap-2 flex flex-row justify-between items-center"
    hoverable
  >
    <div class="flex flex-col gap-1">
      <p
        v-if="landMemberInvitation.email"
        class="font-medium"
      >
        {{ landMemberInvitation.email }}
      </p>
      <template v-if="variant === VARIANT.ForUser">
        <small class="opacity-80">{{ t('invite_sentence.prefix') }}</small>
        <BaseHeading
          v-if="land"
          variant="h3"
          >{{ land.name }}</BaseHeading
        >
        <small
          v-if="variant === VARIANT.ForUser"
          class="opacity-80"
          >{{ t('invite_sentence.suffix') }}
        </small>
      </template>

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
      <DialogTeraLandMemberInvitationDelete
        v-if="variant === VARIANT.Settings && landMemberInvitation"
        :land-member-invitation="landMemberInvitation"
      >
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
          size="sm"
          @click="accept" />
        <Button
          :icon="faTimes"
          variant="negative"
          size="sm"
          @click="refuse"
      /></template>
    </div>
  </Card>
</template>

<script setup lang="ts">
import Card from '@lychen/vue-components-core/card/Card.vue';
import BadgeTeraLandRole from '../../land-role/badge/BadgeTeraLandRole.vue';
import DialogTeraLandMemberInvitationDelete from '../dialogs/delete/DialogTeraLandMemberInvitationDelete.vue';
import Button from '@lychen/vue-components-core/button/Button.vue';
import { faTrash } from '@fortawesome/pro-light-svg-icons/faTrash';
import { faCheck } from '@fortawesome/pro-light-svg-icons/faCheck';
import { faTimes } from '@fortawesome/pro-light-svg-icons/faTimes';
import { VARIANT, type Variant } from '.';
import BadgeTeraLandMemberInvitation from '../badge/BadgeTeraLandMemberInvitation.vue';
import type { components } from '@lychen/tera-api-sdk/generated/tera-api';
import { defineAsyncComponent } from 'vue';
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';
import { TRANSLATION_KEY, messages } from './i18n';
import {
  TRANSLATION_KEY as LAND_MEMBER_INVITATION_TRANSLATION_KEY,
  messages as messagesLandMemberInvitations,
} from '@lychen/tera-i18n/land-member-invitation';
import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-api-sdk/composables/useTeraApi';
import { toast } from '@lychen/vue-components-core/toast';
import {
  landMemberInvitationAcceptSucceededEvent,
  landMemberInvitationRefuseSucceededEvent,
} from '@lychen/tera-events/LandMemberInvitationEvents';
import { useEventBus } from '@vueuse/core';

const BaseHeading = defineAsyncComponent(
  () => import('@lychen/vue-components-app/base-heading/BaseHeading.vue'),
);

const { variant = VARIANT.Settings, landMemberInvitation } = defineProps<{
  variant?: Variant;
  landMemberInvitation: Partial<
    Pick<components['schemas']['LandMemberInvitation.jsonld'], 'email' | 'state' | 'ulid'>
  >;
  landRoles?: Pick<components['schemas']['LandRole.jsonld'], 'name'>[];
  land?: Pick<components['schemas']['Land.jsonld'], 'name'>;
}>();

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { t: tLandMemberInvitation } = useI18nExtended({
  messages: messagesLandMemberInvitations,
  rootKey: LAND_MEMBER_INVITATION_TRANSLATION_KEY,
  prefixed: true,
});

const { api } = useTeraApi();
const { emit: emitAccept } = useEventBus(landMemberInvitationAcceptSucceededEvent);

const { mutate: accept } = useMutation({
  mutationFn: async () => {
    if (!landMemberInvitation.ulid) {
      throw new Error('missing.ulid');
    }
    const response = await api.PATCH('/api/land_member_invitations/{ulid}/accept', {
      params: { path: { ulid: landMemberInvitation.ulid } },
      body: {},
    });

    return response.data;
  },
  onSuccess: (data, variables, context) => {
    toast({
      title: tLandMemberInvitation('action.accept.success.message'),
      variant: 'positive',
    });
    emitAccept(data);
  },
  onError: (error, variables, context) => {
    toast({
      title: tLandMemberInvitation('action.accept.error.message'),
      description: error.message,
      variant: 'negative',
    });
  },
});

const { emit: emitRefuse } = useEventBus(landMemberInvitationRefuseSucceededEvent);
const { mutate: refuse } = useMutation({
  mutationFn: async () => {
    if (!landMemberInvitation.ulid) {
      throw new Error('missing.ulid');
    }
    const response = await api.PATCH('/api/land_member_invitations/{ulid}/refuse', {
      params: {
        path: { ulid: landMemberInvitation.ulid },
      },
      body: {},
    });

    return response.data;
  },
  onSuccess: (data, variables, context) => {
    toast({
      title: tLandMemberInvitation('action.refuse.success.message'),
      variant: 'positive',
    });
    emitRefuse(data);
  },
  onError: (error, variables, context) => {
    toast({
      title: tLandMemberInvitation('action.refuse.error.message'),
      description: error.message,
      variant: 'negative',
    });
  },
});
</script>
