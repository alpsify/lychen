<template>
  <FormField
    v-slot="{ componentField }"
    name="title"
    :validate-on-blur="!isFieldDirty"
    :rules="fieldSchema"
  >
    <FormItem>
      <FormLabel>{{ t('property.title.label') }}</FormLabel>
      <FormControl>
        <Input
          type="text"
          :placeholder="t('property.title.placeholder')"
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
} from '@lychen/vue-components-core/form';
import { Input } from '@lychen/vue-components-core/input';
import { messages, TRANSLATION_KEY } from '@lychen/i18n-tera/land-task';
import { toTypedSchema } from '@vee-validate/zod';
import * as z from 'zod';

import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const fieldSchema = toTypedSchema(z.string().min(2).max(250));

defineProps({
  isFieldDirty: {
    type: Boolean,
    required: true,
  },
});
</script>
