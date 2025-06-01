<template>
  <FormField
    v-slot="{ componentField }"
    :name="name"
    :validate-on-blur="!isFieldDirty"
    :rules="fieldSchema"
  >
    <FormItem>
      <FormLabel>{{ label || t('label') }}</FormLabel>
      <FormControl>
        <Input
          type="text"
          :placeholder="placeholder || t('placeholder')"
          v-bind="componentField"
        />
      </FormControl>
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
} from '@lychen/vue-ui-components-core/form';
import { Input } from '@lychen/vue-ui-components-core/input';
import { toTypedSchema } from '@vee-validate/zod';
import * as z from 'zod';
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';

const fieldSchema = toTypedSchema(z.string().email());

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

withDefaults(
  defineProps<{
    isFieldDirty: boolean;
    label?: string;
    placeholder?: string;
    name?: string;
  }>(),
  {
    label: undefined,
    placeholder: undefined,
    name: 'email',
  },
);
</script>
