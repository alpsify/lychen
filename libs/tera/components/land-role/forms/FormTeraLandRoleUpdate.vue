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
      :label="t('action.update.label')"
    />
  </form>
</template>

<script lang="ts" setup>
import { toast } from '@lychen/vue-components-core/toast/use-toast';
import Button from '@lychen/vue-components-core/button/Button.vue';
import { messages, TRANSLATION_KEY } from '@lychen/tera-i18n/land-role';

import { useForm } from 'vee-validate';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/vue-tera/composables/use-tera-api/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { useEventBus } from '@vueuse/core';
import FormFieldTeraLandRoleName from './fields/FormFieldTeraLandRoleName.vue';
import FormFieldTeraPermissions from '../../permission/form/field/FormFieldTeraPermissions.vue';

import { landRolePatchSucceededEvent } from '@lychen/tera-events/LandRoleEvents';
import type {
  components,
  LandRoleUserLand_rolePatchPermissions,
  paths,
} from '@lychen/typescript-tera-api-sdk/generated/tera-api';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { landRole } = defineProps<{ landRole: components['schemas']['LandRole.jsonld'] }>();

type FormType =
  paths['/api/land_roles/{ulid}']['patch']['requestBody']['content']['application/merge-patch+json'];

const { isFieldDirty, handleSubmit, meta, setFieldValue, values } = useForm<FormType>({
  initialValues: {
    name: landRole.name,
    permissions: landRole.permissions,
  },
});

const { emit } = useEventBus(landRolePatchSucceededEvent);

const { api } = useTeraApi();

const { mutate, isPending } = useMutation({
  mutationFn: async (data: FormType) => {
    if (!landRole.ulid) {
      throw new Error('missing.ulid');
    }
    const response = await api.PATCH('/api/land_roles/{ulid}', {
      params: {
        path: { ulid: landRole.ulid },
      },
      body: data,
    });
    return response.data;
  },
  onSuccess: (data, variables, context) => {
    toast({
      title: t('action.update.success.message'),
      variant: 'positive',
    });
    emit(data);
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

function handlePermissionsUpdate(newPermissions: LandRoleUserLand_rolePatchPermissions[]) {
  setFieldValue('permissions', newPermissions);
}
</script>
