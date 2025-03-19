<template>
  <form
    class="flex flex-col gap-6"
    @submit.prevent="onSubmit"
  >
    <Button
      :disabled="!meta.valid || isPending || !meta.dirty"
      :loading="isPending"
      size="sm"
      type="submit"
      class="self-end"
      :text="t('action.update.label')"
    />
  </form>
</template>

<script lang="ts" setup>
import { toast } from '@lychen/vue-ui-components-core/toast/use-toast';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-member-invitation';

import { useForm } from 'vee-validate';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { useEventBus } from '@vueuse/core';

import type {
  LandMemberInvitationJsonld,
  LandMemberInvitationUserLandMemberInvitationPatch,
} from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { landMemberInvitationPatchSucceededEvent } from '@lychen/tera-util-events/LandMemberInvitationEvents';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { landMemberInvitation } = defineProps<{
  landMemberInvitation: LandMemberInvitationJsonld;
}>();

const { handleSubmit, meta } = useForm<LandMemberInvitationUserLandMemberInvitationPatch>({
  initialValues: {},
});

const { emit } = useEventBus(landMemberInvitationPatchSucceededEvent);

const api = useTeraApi('LandMemberInvitation');

const { mutate, isPending } = useMutation({
  mutationFn: (data: LandMemberInvitationUserLandMemberInvitationPatch) =>
    api.landMemberInvitationPatch(landMemberInvitation.ulid!, data),
  onSuccess: (data: { data: LandMemberInvitationJsonld }, variables, context) => {
    toast({
      title: t('action.update.success.message'),
      variant: 'positive',
    });
    emit(data.data);
  },
  onError: (error, variables, context) => {
    toast({
      title: t('action.update.error.message'),
      description: error.message,
      variant: 'negative',
    });
  },
});

const onSubmit = handleSubmit((values) => {
  mutate(values);
});
</script>
