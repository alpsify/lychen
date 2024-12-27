<template>
  <a
    :href="LINK.TallyPreregisterForm"
    target="_blank"
  >
    <LychenButton
      variant="default"
      size="sm"
      class="gap-2"
      data-umami-event="Clicks on pre-register"
      >{{ t(`label`) }} <LychenIcon icon="rocket-launch" /></LychenButton
  ></a>
</template>

<script setup lang="ts">
import LychenButton from '@lychen/ui-components/button/LychenButton.vue';
import LychenIcon from '@lychen/ui-components/icon/LychenIcon.vue';
import { LINK } from '@lychen/util-constants/Link';
import { TRANSLATION_KEY, messages } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
