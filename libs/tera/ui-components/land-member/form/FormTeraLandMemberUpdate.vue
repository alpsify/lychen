<template>
  <form
    class="flex flex-col gap-6"
    @submit.prevent="onSubmit"
  >
    <FormFieldTeraLandRole
      :is-field-dirty="isFieldDirty"
      :land="land"
      :initial-values="landMember.landRoles"
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
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-member';
import FormFieldTeraLandRole from '../../land-role/forms/fields/FormFieldTeraLandRole.vue';

import { useForm } from 'vee-validate';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { useEventBus } from '@vueuse/core';

import type {
  LandJsonld,
  LandMemberJsonld,
  LandRoleJsonld,
} from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { landMemberPatchSucceededEvent } from '@lychen/tera-util-events/LandMemberEvents';
import { extractValuesByKey } from '@lychen/typescript-util-object/Object';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { landMember } = defineProps<{
  landMember: Omit<LandMemberJsonld, 'landRoles'> & {
    landRoles: LandRoleJsonld[];
  };
  land: LandJsonld;
}>();

interface FormType {
  landRoles: LandRoleJsonld[];
}

const { handleSubmit, meta, setFieldValue, isFieldDirty } = useForm<FormType>({
  initialValues: {},
});

const { emit } = useEventBus(landMemberPatchSucceededEvent);

const api = useTeraApi('LandMember');

const { mutate, isPending } = useMutation({
  mutationFn: (values: FormType) => {
    const landRoleIds = extractValuesByKey(values.landRoles, '@id');
    return api.landMemberPatch(landMember.ulid!, { landRoles: landRoleIds });
  },
  onSuccess: (data: { data: LandMemberJsonld }, variables, context) => {
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
