<template>
  <form
    class="flex flex-col gap-6"
    @submit="onSubmit"
  >
    <FormFieldTeraLandName :is-field-dirty="isFieldDirty" />
    <FormFieldTeraLandRolePermissions :is-field-dirty="isFieldDirty" />
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
import FormFieldTeraLandName from './fields/FormFieldTeraLandRoleName.vue';
import FormFieldTeraLandRolePermissions from './fields/FormFieldTeraLandRolePermissions.vue';

import type {
  LandRoleJsonld,
  LandRolePatchPayload,
} from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { landRolePatchSucceededEvent } from '@lychen/tera-util-events/LandRoleEvents';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { landRole } = defineProps<{ landRole: LandRoleJsonld }>();

const { isFieldDirty, handleSubmit, meta } = useForm<LandRolePatchPayload>({
  initialValues: {
    name: landRole.name,
    permissions: landRole.permissions,
  },
});

const { emit } = useEventBus(landRolePatchSucceededEvent);

const api = useTeraApi('LandRole');

const { mutate, isPending } = useMutation({
  mutationFn: (data: LandRolePatchPayload) => api.landRolePatch(landRole.ulid!, data),
  onSuccess: (data, variables, context) => {
    toast({
      title: t('action.update.success.message'),
      variant: 'positive',
    });
    emit(data.data);
  },
  onError: (error, variables, context) => {},
  onSettled: (data, error, variables, context) => {},
});

const onSubmit = handleSubmit((values) => {
  mutate(values);
});
</script>
