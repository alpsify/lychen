<template>
  <form
    class="flex flex-col gap-6"
    @submit.prevent="onSubmit"
  >
    <FormFieldEmail :is-field-dirty="isFieldDirty" />
    <FormFieldTeraLandRole
      :is-field-dirty="isFieldDirty"
      :land="land"
      @update:model-value="setFieldValue('landRoles', $event)"
    />
    <Button
      :disabled="!meta.valid || isPending"
      :loading="isPending"
      type="submit"
      class="self-end"
      :text="t('action.create.label')"
    />
  </form>
</template>

<script lang="ts" setup>
import { toast } from '@lychen/vue-ui-components-core/toast/use-toast';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import FormFieldEmail from '@lychen/vue-ui-components-app/fields/email/FormFieldEmail.vue';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-member-invitation';

import { useForm } from 'vee-validate';
import {
  type LandJsonld,
  type LandMemberInvitationJsonld,
  type LandMemberInvitationJsonldUserLandMemberInvitationPost,
} from '@lychen/tera-util-api-sdk/generated/data-contracts';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { useEventBus } from '@vueuse/core';
import { landMemberInvitationPostSucceededEvent } from '@lychen/tera-util-events/LandMemberInvitationEvents';
import FormFieldTeraLandRole from '../../land-role/forms/fields/FormFieldTeraLandRole.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { land } = defineProps<{ land: LandJsonld }>();

const { isFieldDirty, handleSubmit, meta, setFieldValue } =
  useForm<LandMemberInvitationJsonldUserLandMemberInvitationPost>({
    initialValues: {
      landRoles: undefined,
    },
  });

const { emit } = useEventBus(landMemberInvitationPostSucceededEvent);

const landApi = useTeraApi('LandMemberInvitation');

const { mutate, isPending } = useMutation({
  mutationFn: (newLandMemberInvitation: LandMemberInvitationJsonldUserLandMemberInvitationPost) =>
    landApi.landMemberInvitationPost({ ...newLandMemberInvitation, land: land['@id']! }),
  onSuccess: (data: { data: LandMemberInvitationJsonld }, variables, context) => {
    toast({
      title: t('action.create.success.message'),
      variant: 'positive',
    });
    emit(data.data);
  },
  onError: (error, variables, context) => {
    toast({
      title: t('action.create.error.message'),
      description: error.message,
      variant: 'negative',
    });
  },
});

const onSubmit = handleSubmit((values) => {
  mutate(values);
});
</script>
