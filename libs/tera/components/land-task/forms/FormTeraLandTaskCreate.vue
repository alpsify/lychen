<template>
  <form
    class="flex flex-col gap-6"
    @submit.prevent="onSubmit"
  >
    <FormFieldTeraLandTaskTitle :is-field-dirty="isFieldDirty" />
    <Button
      :disabled="!meta.valid || isPending"
      :loading="isPending"
      type="submit"
      class="self-end"
      :label="t('action.create.label')"
    />
  </form>
</template>

<script lang="ts" setup>
import { toast } from '@lychen/vue-components-core/toast/use-toast';
import Button from '@lychen/vue-components-core/button/Button.vue';
import { messages, TRANSLATION_KEY } from '@lychen/tera-i18n/land-task';

import { useForm } from 'vee-validate';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-api-sdk/composables/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { useEventBus } from '@vueuse/core';
import FormFieldTeraLandTaskTitle from './fields/FormFieldTeraLandTaskTitle.vue';
import type { paths } from '@lychen/tera-api-sdk/generated/tera-api';
import { inject } from 'vue';
import { INJECTION_KEY_LAND } from '@lychen/tera-constants/InjectionKeys';
import { EVENT_landTaskPostSucceeded } from '@lychen/tera-events/LandTaskEvents';

const land = inject(INJECTION_KEY_LAND);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

type LandTaskPostRequest =
  paths['/api/land_tasks']['post']['requestBody']['content']['application/ld+json'];

const { isFieldDirty, handleSubmit, meta, setFieldValue } = useForm<LandTaskPostRequest>({
  initialValues: {
    land: land?.value?.['@id'],
  },
});

const { emit } = useEventBus(EVENT_landTaskPostSucceeded);

const { api } = useTeraApi();

const { mutate, isPending } = useMutation({
  mutationFn: async (data: LandTaskPostRequest) => {
    const response = await api.POST('/api/land_tasks', {
      body: data,
    });
    return response.data;
  },
  onSuccess: (data, variables, context) => {
    toast({
      title: t('action.create.success.message'),
      variant: 'positive',
    });
    emit(data);
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
