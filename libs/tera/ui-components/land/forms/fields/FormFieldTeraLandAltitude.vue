<template>
  <FormField
    v-slot="{ value }"
    name="altitude"
    :validate-on-blur="!isFieldDirty"
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
} from '@lychen/vue-ui-components-core/form';
import {
  NumberField,
  NumberFieldContent,
  NumberFieldDecrement,
  NumberFieldIncrement,
} from '@lychen/vue-ui-components-core/number-field';
import NumberFieldInput from '@lychen/vue-ui-components-core/number-field/NumberFieldInput.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

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
