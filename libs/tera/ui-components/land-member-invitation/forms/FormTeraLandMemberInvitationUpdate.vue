<template>
  <form
    class="flex flex-col gap-6"
    @submit.prevent="onSubmit"
  >
    <FormFieldTeraLandRole
      :is-field-dirty="isFieldDirty"
      :land="land"
      :initial-values="landMemberInvitation.landRoles"
      @update:model-value="setFieldValue('landRoles', $event)"
    />
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
import FormFieldTeraLandRole from '../../land-role/forms/fields/FormFieldTeraLandRole.vue';

import type {
  LandJsonld,
  LandMemberInvitationJsonld,
  LandRoleJsonld,
} from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { landMemberInvitationPatchSucceededEvent } from '@lychen/tera-util-events/LandMemberInvitationEvents';
import { extractValuesByKey } from '@lychen/typescript-util-object/Object';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { landMemberInvitation } = defineProps<{
  landMemberInvitation: Omit<LandMemberInvitationJsonld, 'landRoles'> & {
    landRoles: LandRoleJsonld[];
  };
  land: LandJsonld;
}>();

interface FormType {
  landRoles: LandRoleJsonld[];
}

const { isFieldDirty, handleSubmit, meta, setFieldValue } = useForm<FormType>({});

const { emit } = useEventBus(landMemberInvitationPatchSucceededEvent);

const api = useTeraApi('LandMemberInvitation');

const { mutate, isPending } = useMutation({
  mutationFn: (values: FormType) => {
    const landRoleIds = extractValuesByKey(values.landRoles, '@id');
    return api.landMemberInvitationPatch(landMemberInvitation.ulid!, { landRoles: landRoleIds });
  },
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
