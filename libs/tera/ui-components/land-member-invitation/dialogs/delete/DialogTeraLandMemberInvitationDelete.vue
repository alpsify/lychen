<template>
  <Dialog>
    <DialogTrigger as-child>
      <slot />
    </DialogTrigger>
    <DialogContentWithAction
      :title="t('title')"
      :description="t('description')"
    >
      <template #content></template>
      <template #action>
        <Button
          variant="negative"
          :disabled="isPending"
          :loading="isPending"
          @click="deleteLandMemberInvitation()"
        >
          {{ tLandMemberInvitation('action.delete.label') }}
        </Button>
      </template>
    </DialogContentWithAction>
  </Dialog>
</template>

<script lang="ts" setup>
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { Dialog, DialogTrigger } from '@lychen/vue-ui-components-core/dialog';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import {
  messages as landMemberInvitationMessages,
  TRANSLATION_KEY as LAND_MEMBER_INVITATION_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land-member-invitation';
import { messages, TRANSLATION_KEY } from './i18n';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useMutation } from '@tanstack/vue-query';
import { toast } from '@lychen/vue-ui-components-core/toast/use-toast';
import { useEventBus } from '@vueuse/core';
import { landMemberInvitationDeleteSucceededEvent } from '@lychen/tera-util-events/LandMemberInvitationEvents';
import DialogContentWithAction from '@lychen/vue-ui-components-app/dialogs/DialogContentWithAction.vue';

const { t: tLandMemberInvitation } = useI18nExtended({
  messages: landMemberInvitationMessages,
  rootKey: LAND_MEMBER_INVITATION_TRANSLATION_KEY,
  prefixed: true,
});

const { t: t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});

const { emit } = useEventBus(landMemberInvitationDeleteSucceededEvent);

const { landMemberInvitation } = defineProps<{
  landMemberInvitation: { ulid: string };
}>();

const api = useTeraApi('LandMemberInvitation');

const { mutate: deleteLandMemberInvitation, isPending } = useMutation({
  mutationFn: () => api.landMemberInvitationDelete(landMemberInvitation.ulid!),
  onSuccess: (data, variables, context) => {
    toast({
      title: tLandMemberInvitation('action.delete.success.message'),
      variant: 'positive',
    });
    emit(landMemberInvitation);
  },
  onError: (error, variables, context) => {
    toast({
      title: tLandMemberInvitation('action.delete.error.message'),
      description: error.message,
      variant: 'negative',
    });
  },
});
</script>
