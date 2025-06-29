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
    >
      <template #icon>
        <IconRocketLaunch />
      </template>
    </Button>
  </a>
</template>

<script setup lang="ts">
import Button from '@lychen/vue-components-core/button/Button.vue';
import { LINK } from '@lychen/typescript-constants/Link';
import { TRANSLATION_KEY, messages } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import IconRocketLaunch from '@lychen/vue-icons/IconRocketLaunch.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
