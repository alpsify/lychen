<template>
  <form
    class="flex flex-col gap-6"
    @submit.prevent="onSubmit"
  >
    <FormFieldTeraLandRoleName :is-field-dirty="isFieldDirty" />
    <FormFieldTeraPermissions
      :is-field-dirty="isFieldDirty"
      :model-value="values.permissions"
      @update:model-value="handlePermissionsUpdate"
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
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-role';

import { useForm } from 'vee-validate';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { useEventBus } from '@vueuse/core';
import FormFieldTeraLandRoleName from './fields/FormFieldTeraLandRoleName.vue';
import FormFieldTeraPermissions from '../../permission/form/field/FormFieldTeraPermissions.vue';

import type {
  LandRoleJsonld,
  LandRolePatchPayload,
  LandRolePatchPermissionsEnum,
} from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { landRolePatchSucceededEvent } from '@lychen/tera-util-events/LandRoleEvents';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { landRole } = defineProps<{ landRole: LandRoleJsonld }>();

const { isFieldDirty, handleSubmit, meta, setFieldValue, values } = useForm<LandRolePatchPayload>({
  initialValues: {
    name: landRole.name,
    permissions: landRole.permissions as LandRolePatchPermissionsEnum[],
  },
});

const { emit } = useEventBus(landRolePatchSucceededEvent);

const api = useTeraApi('LandRole');

const { mutate, isPending } = useMutation({
  mutationFn: (data: LandRolePatchPayload) => api.landRolePatch(landRole.ulid!, data),
  onSuccess: (data: { data: LandRoleJsonld }, variables, context) => {
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

function handlePermissionsUpdate(newPermissions: LandRolePatchPermissionsEnum[]) {
  setFieldValue('permissions', newPermissions);
}
</script>
