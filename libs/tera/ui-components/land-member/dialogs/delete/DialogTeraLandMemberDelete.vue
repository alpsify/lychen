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
          variant="positive"
          :disabled="isPending"
          :loading="isPending"
          @click="deleteLandMember()"
        >
          {{ tLandMember('action.delete.label') }}
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
  messages as landMemberMessages,
  TRANSLATION_KEY as LAND_MEMBER_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land-member';
import { messages, TRANSLATION_KEY } from './i18n';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useMutation } from '@tanstack/vue-query';
import { toast } from '@lychen/vue-ui-components-core/toast/use-toast';
import { useEventBus } from '@vueuse/core';
import { landMemberDeleteSucceededEvent } from '@lychen/tera-util-events/LandMemberEvents';
import type { LandMemberJsonld } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import DialogContentWithAction from '@lychen/vue-ui-components-app/dialogs/DialogContentWithAction.vue';

const { t: tLandMember } = useI18nExtended({
  messages: landMemberMessages,
  rootKey: LAND_MEMBER_TRANSLATION_KEY,
  prefixed: true,
});

const { t: t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});

const { emit } = useEventBus(landMemberDeleteSucceededEvent);

const { landMember } = defineProps<{ landMember: LandMemberJsonld }>();

const api = useTeraApi('LandMember');

const { mutate: deleteLandMember, isPending } = useMutation({
  mutationFn: () => {
    if (!landMember.ulid) {
      throw new Error('error.missing_ulid');
    }
    return api.landMemberDelete(landMember.ulid);
  },
  onSuccess: (data, variables, context) => {
    toast({
      title: tLandMember('action.delete.success.message'),
      variant: 'positive',
    });
    emit(landMember);
  },
  onError: (error, variables, context) => {
    toast({
      title: tLandMember('action.delete.error.message'),
      description: error.message,
      variant: 'negative',
    });
  },
});
</script>
