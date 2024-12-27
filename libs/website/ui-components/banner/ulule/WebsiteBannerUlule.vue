<template>
  <a
    href="https://fr.ulule.com/lychen/coming-soon/"
    target="_blank"
    data-umami-event="Click on Ulule banner"
  >
    <LychenGlowBorder
      class="grow hover:shadow-md rounded-lg cursor-pointer"
      :color="[
        'rgb(var(--color-primary))',
        'rgb(var(--color-secondary))',
        'rgb(var(--color-tertiary))',
      ]"
    >
      <div
        class="p-6 rounded-lg bg-surface-container flex flex-col md:grid md:grid-cols-[1fr_30%_20%] gap-4"
      >
        <div class="flex flex-col items-center md:items-start">
          <LychenTextGenerateEffect
            :words="t('title')"
            class="text-xl font-bold opacity-90"
          />
          <LychenParagraph>{{ t('description') }}</LychenParagraph>
        </div>
        <div class="flex flex-row items-center justify-center gap-4">
          <LychenLogo class="h-14" />
          <p class="opacity-50">X</p>
          <img
            :src="isDark ? imageUrl : imageUrlLight"
            class="h-14 object-cover"
            alt="Ulule Logo"
          />
        </div>
        <div class="flex flex-col gap-2 justify-center items-end">
          <p>Le 01/02/2025</p>
          <p class="text-sm text-right font-bold">{{ t('preregister') }}</p>
        </div>
      </div>
    </LychenGlowBorder>
  </a>
</template>

<script setup lang="ts">
import imageUrl from './assets/ulule_horizontal_blanc.png';
import imageUrlLight from './assets/ulule_horizontal.png';
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { usePreferredColorScheme } from '@lychen/vue-util-composables/usePreferredColorScheme';

const LychenLogo = defineAsyncComponent(() => import('@lychen/ui-components/logo/LychenLogo.vue'));

const LychenGlowBorder = defineAsyncComponent(
  () => import('@lychen/ui-components/glow-border/LychenGlowBorder.vue'),
);

const LychenTextGenerateEffect = defineAsyncComponent(
  () => import('@lychen/ui-components/text-generate-effect/LychenTextGenerateEffect.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { isDark } = usePreferredColorScheme();
</script>
