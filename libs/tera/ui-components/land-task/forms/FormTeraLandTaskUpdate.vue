<template>
  <form
    class="flex flex-col gap-6"
    @submit.prevent="onSubmit"
  >
    <FormFieldTeraLandTaskTitle :is-field-dirty="isFieldDirty" />
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
import { toast } from '@lychen/vue-ui-components-core/toast/use-toast';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-task';

import { useForm } from 'vee-validate';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { useEventBus } from '@vueuse/core';

import { landTaskPatchSucceededEvent } from '@lychen/tera-util-events/LandTaskEvents';
import FormFieldTeraLandTaskTitle from './fields/FormFieldTeraLandTaskTitle.vue';
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { landTask } = defineProps<{
  landTask: components['schemas']['LandTask.jsonld'];
  land: components['schemas']['Land.jsonld'];
}>();

interface FormType {
  title: components['schemas']['LandTask.jsonld']['title'];
}

const { handleSubmit, meta, setFieldValue, isFieldDirty } = useForm<FormType>({
  initialValues: {},
});

const { emit } = useEventBus(landTaskPatchSucceededEvent);

const { api } = useTeraApi();

const { mutate, isPending } = useMutation({
  mutationFn: async (values: FormType) => {
    if (!landTask.ulid) {
      throw new Error('missing.ulid');
    }
    const response = await api.PATCH('/api/land_tasks/{ulid}', {
      params: { path: { ulid: landTask.ulid } },
      body: values,
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
</script>
