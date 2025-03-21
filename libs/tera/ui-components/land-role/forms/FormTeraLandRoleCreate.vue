<template>
  <form
    class="flex flex-col gap-6"
    @submit.prevent="onSubmit"
  >
    <FormFieldTeraLandRoleName :is-field-dirty="isFieldDirty" />
    <FormFieldTeraPermissions
      :is-field-dirty="isFieldDirty"
      @update:model-value="setFieldValue('permissions', $event)"
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
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-role';

import { useForm } from 'vee-validate';
import {
  type LandJsonld,
  type LandRoleJsonld,
  type LandRoleJsonldUserLandRolePost,
} from '@lychen/tera-util-api-sdk/generated/data-contracts';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { useEventBus } from '@vueuse/core';
import { landRolePostSucceededEvent } from '@lychen/tera-util-events/LandRoleEvents';
import FormFieldTeraLandRoleName from './fields/FormFieldTeraLandRoleName.vue';
import FormFieldTeraPermissions from '../../permission/form/field/FormFieldTeraPermissions.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { land } = defineProps<{ land: LandJsonld }>();

const { isFieldDirty, handleSubmit, meta, setFieldValue } = useForm<LandRoleJsonldUserLandRolePost>(
  {
    initialValues: {
      permissions: undefined,
    },
  },
);

const { emit } = useEventBus(landRolePostSucceededEvent);

const landApi = useTeraApi('LandRole');

const { mutate, isPending } = useMutation({
  mutationFn: (newLandRole: LandRoleJsonldUserLandRolePost) =>
    landApi.landRolePost({ ...newLandRole, land: land['@id']! }),
  onSuccess: (data: { data: LandRoleJsonld }, variables, context) => {
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
