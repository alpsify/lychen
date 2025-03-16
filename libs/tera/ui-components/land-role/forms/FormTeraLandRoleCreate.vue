<template>
  <form
    class="flex flex-col gap-6"
    @submit="onSubmit"
  >
    <FormFieldTeraLandRoleName :is-field-dirty="isFieldDirty" />
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
import { toTypedSchema } from '@vee-validate/zod';
import * as z from 'zod';
import { type LandRolePostPayload } from '@lychen/tera-util-api-sdk/generated/data-contracts';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { useEventBus } from '@vueuse/core';
import { landRolePostSucceededEvent } from '@lychen/tera-util-events/LandRoleEvents';
import FormFieldTeraLandRoleName from './fields/FormFieldTeraLandRoleName.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const formSchema = toTypedSchema(
  z.object({
    name: z.string().min(2).max(40),
    surface: z.number().min(1),
    altitude: z.number(),
  }),
);

const { isFieldDirty, handleSubmit, meta, setFieldValue } = useForm({
  validationSchema: formSchema,
  initialValues: {},
});

const { emit } = useEventBus(landRolePostSucceededEvent);

const landApi = useTeraApi('LandRole');

const { mutate, isPending } = useMutation({
  mutationFn: (newLand: LandRolePostPayload) => landApi.landRolePost(newLand),
  onSuccess: (data, variables, context) => {
    toast({
      title: t('action.create.success.message'),
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
