<template>
  <a
    :href="LINK.TallyPreregisterForm"
    target="_blank"
  >
    <Button
      variant="default"
      size="sm"
      class="gap-2"
      data-umami-event="Clicks on pre-register"
      :text="t(`label`)"
      icon="rocket-launch"
    />
  </a>
</template>

<script setup lang="ts">
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { LINK } from '@lychen/util-constants/Link';
import { TRANSLATION_KEY, messages } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
