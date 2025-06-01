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
      :label="t(`label`)"
      :icon="faRocketLaunch"
    />
  </a>
</template>

<script setup lang="ts">
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { LINK } from '@lychen/typescript-constants/Link';
import { TRANSLATION_KEY, messages } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';
import { faRocketLaunch } from '@fortawesome/pro-light-svg-icons/faRocketLaunch';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
