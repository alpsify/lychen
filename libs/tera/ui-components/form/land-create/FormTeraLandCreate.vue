<template>
  <form
    class="flex flex-col gap-6"
    @submit="onSubmit"
  >
    <FormField
      v-slot="{ componentField }"
      name="name"
      :validate-on-blur="!isFieldDirty"
    >
      <FormItem>
        <FormLabel>{{ t('property.name.label') }}</FormLabel>
        <FormControl>
          <Input
            type="text"
            :placeholder="t('property.name.placeholder')"
            v-bind="componentField"
          />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>

    <FormField
      v-slot="{ value }"
      name="surface"
      :validate-on-blur="!isFieldDirty"
    >
      <FormItem>
        <FormLabel>{{ t('property.surface.label') }}</FormLabel>
        <NumberField
          :min="1"
          :model-value="value"
          @update:model-value="
            (v) => {
              if (v) {
                setFieldValue('surface', v);
              } else {
                setFieldValue('surface', undefined);
              }
            }
          "
        >
          <NumberFieldContent>
            <NumberFieldDecrement />
            <FormControl>
              <NumberFieldInput />
            </FormControl>
            <NumberFieldIncrement />
          </NumberFieldContent>
        </NumberField>
        <FormDescription> {{ t('property.surface.description') }} </FormDescription>
        <FormMessage />
      </FormItem>
    </FormField>

    <FormField
      v-slot="{ value }"
      name="altitude"
      :validate-on-blur="!isFieldDirty"
    >
      <FormItem>
        <FormLabel>{{ t('property.altitude.label') }}</FormLabel>
        <NumberField
          :model-value="value"
          @update:model-value="
            (v) => {
              if (v) {
                setFieldValue('altitude', v);
              } else {
                setFieldValue('altitude', undefined);
              }
            }
          "
        >
          <NumberFieldContent>
            <NumberFieldDecrement />
            <FormControl>
              <NumberFieldInput />
            </FormControl>
            <NumberFieldIncrement />
          </NumberFieldContent>
        </NumberField>
        <FormDescription>
          {{ t('property.altitude.description') }}
        </FormDescription>
        <FormMessage />
      </FormItem>
    </FormField>

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
import {
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from '@lychen/vue-ui-components-core/form';
import { Input } from '@lychen/vue-ui-components-core/input';
import { toast } from '@lychen/vue-ui-components-core/toast/use-toast';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land';

import { useForm } from 'vee-validate';
import { toTypedSchema } from '@vee-validate/zod';
import * as z from 'zod';
import { type LandPostPayload } from '@lychen/tera-util-api-sdk/generated/data-contracts';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import {
  NumberField,
  NumberFieldContent,
  NumberFieldDecrement,
  NumberFieldIncrement,
} from '@lychen/vue-ui-components-core/number-field';
import NumberFieldInput from '@lychen/vue-ui-components-core/number-field/NumberFieldInput.vue';
import { useEventBus } from '@vueuse/core';
import { landPostSucceededEvent } from '@lychen/tera-util-events/LandEvents';

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
  initialValues: {
    altitude: 0,
    surface: 1,
  },
});

const { emit } = useEventBus(landPostSucceededEvent);

const landApi = useTeraApi('Land');

const { mutate, isPending } = useMutation({
  mutationFn: (newLand: LandPostPayload) => landApi.landPost(newLand),
  onSuccess: (data, variables, context) => {
    toast({
      title: 'Espace de culture créé',
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
