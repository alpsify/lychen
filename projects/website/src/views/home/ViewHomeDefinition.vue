<template>
  <LychenPatternBackground
    id="definition"
    :animate="true"
    :direction="PATTERN_BACKGROUND_DIRECTION.Bottom"
    :variant="PATTERN_BACKGROUND_VARIANT.Dot"
    :mask="PATTERN_BACKGROUND_MASK.EllipseTop"
    class="flex h-[30rem] w-full flex-col items-center justify-center text-center"
    size="md"
    :speed="PATTERN_BACKGROUND_SPEED.Slow"
  >
    <LychenTitle
      variant="h1"
      class="z-10 text-surface-on"
      >{{ t('definition.phonetic') }}
    </LychenTitle>
    <LychenTextGenerateEffect
      :words="t('definition.definition')"
      class="text-xl font-bold opacity-90 lg:w-1/3"
    />
  </LychenPatternBackground>
</template>

<script setup lang="ts">
import {
  PATTERN_BACKGROUND_DIRECTION,
  PATTERN_BACKGROUND_MASK,
  PATTERN_BACKGROUND_SPEED,
  PATTERN_BACKGROUND_VARIANT,
} from '@lychen/ui-components/pattern-background';
import { defineAsyncComponent } from 'vue';

import { useTranslations } from './i18n';

const LychenPatternBackground = defineAsyncComponent(
  () => import('@lychen/ui-components/pattern-background/LychenPatternBackground.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenTextGenerateEffect = defineAsyncComponent(
  () => import('@lychen/ui-components/text-generate-effect/LychenTextGenerateEffect.vue'),
);

const { t } = useTranslations();
</script>
