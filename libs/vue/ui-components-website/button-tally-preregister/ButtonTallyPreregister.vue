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
      :icon="faRocketLaunch"
    />
  </a>
</template>

<script setup lang="ts">
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { LINK } from '@lychen/typescript-util-constants/Link';
import { TRANSLATION_KEY, messages } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { faRocketLaunch } from '@fortawesome/pro-light-svg-icons/faRocketLaunch';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
