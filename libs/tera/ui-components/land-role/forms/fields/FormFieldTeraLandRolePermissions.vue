<template>
  <FormField
    v-slot="{ componentField }"
    name="permissions"
    :validate-on-blur="!isFieldDirty"
    :rules="fieldSchema"
  >
    <FormItem>
      <FormLabel>{{ t('property.permissions.label') }}</FormLabel>
      <FormControl>
        <Input
          type="text"
          :placeholder="t('property.permissions.placeholder')"
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
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-role';
import { toTypedSchema } from '@vee-validate/zod';
import * as z from 'zod';

import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const fieldSchema = toTypedSchema(z.array(z.string()));

defineProps({
  isFieldDirty: {
    type: Boolean,
    required: true,
  },
});
</script>
