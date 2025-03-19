<template>
  <form
    class="flex flex-col gap-6"
    @submit="onSubmit"
  >
    <FormFieldTeraLandName :is-field-dirty="isFieldDirty" />
    <FormFieldTeraLandSurface
      :is-field-dirty="isFieldDirty"
      @update:model-value="setFieldValue('surface', $event)"
    />
    <FormFieldTeraLandAltitude
      :is-field-dirty="isFieldDirty"
      @update:model-value="setFieldValue('altitude', $event)"
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
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land';

import { useForm } from 'vee-validate';
import {
  type LandJsonld,
  type LandPostPayload,
} from '@lychen/tera-util-api-sdk/generated/data-contracts';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { useEventBus } from '@vueuse/core';
import { landPostSucceededEvent } from '@lychen/tera-util-events/LandEvents';
import FormFieldTeraLandName from './fields/FormFieldTeraLandName.vue';
import FormFieldTeraLandAltitude from './fields/FormFieldTeraLandAltitude.vue';
import FormFieldTeraLandSurface from './fields/FormFieldTeraLandSurface.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { isFieldDirty, handleSubmit, meta, setFieldValue } = useForm<LandPostPayload>({
  initialValues: {
    altitude: 0,
    surface: 1,
  },
});

const { emit } = useEventBus(landPostSucceededEvent);

const landApi = useTeraApi('Land');

const { mutate, isPending } = useMutation({
  mutationFn: (newLand: LandPostPayload) => landApi.landPost(newLand),
  onSuccess: (data: { data: LandJsonld }, variables, context) => {
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
