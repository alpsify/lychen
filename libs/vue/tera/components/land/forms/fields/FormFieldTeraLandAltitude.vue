<template>
  <FormField
    v-slot="{ value }"
    name="altitude"
    :validate-on-blur="!isFieldDirty"
    :rules="fieldSchema"
  >
    <FormItem>
      <FormLabel>{{ t('property.altitude.label') }}</FormLabel>
      <NumberField
        :model-value="value"
        @update:model-value="onUpdateModelValue"
      >
        <NumberFieldContent>
          <NumberFieldDecrement />
          <FormControl>
            <NumberFieldInput />
          </FormControl>
          <NumberFieldIncrement />
        </NumberFieldContent>
      </NumberField>
      <FormDescription>{{ t('property.altitude.description') }}</FormDescription>
      <FormMessage />
    </FormItem>
  </FormField>
</template>

<script lang="ts" setup>
import {
  FormControl,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
  FormDescription,
} from '@lychen/vue-components-core/form';
import {
  NumberField,
  NumberFieldContent,
  NumberFieldDecrement,
  NumberFieldIncrement,
} from '@lychen/vue-components-core/number-field';
import NumberFieldInput from '@lychen/vue-components-core/number-field/NumberFieldInput.vue';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from '@lychen/i18n-tera/land';
import { toTypedSchema } from '@vee-validate/zod';
import * as z from 'zod';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const fieldSchema = toTypedSchema(z.number());

defineProps({
  isFieldDirty: {
    type: Boolean,
    required: true,
  },
});

const emit = defineEmits(['update:modelValue']);

function onUpdateModelValue(value: number | undefined) {
  emit('update:modelValue', value);
}
</script>
