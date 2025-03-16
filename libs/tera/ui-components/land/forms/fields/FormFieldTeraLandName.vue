<template>
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
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land';

import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

defineProps({
  isFieldDirty: {
    type: Boolean,
    required: true,
  },
});
</script>
