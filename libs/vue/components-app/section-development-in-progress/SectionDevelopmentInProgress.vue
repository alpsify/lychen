<template>
  <PatternBackground
    :direction="PATTERN_BACKGROUND_DIRECTION.TopRight"
    :variant="PATTERN_BACKGROUND_VARIANT.Grid"
    class="flex flex-col gap-4 p-20 rounded-3xl bg-surface-container size-full justify-center items-center"
  >
    <Icon
      :icon="faTrowelBricks"
      size="2xl"
      class="text-warning"
    />
    <div class="flex flex-col justify-center items-center">
      <BaseHeading class="text-warning">{{ title }}</BaseHeading>
      <p class="opacity-70 text-sm text-warning">En cours de développement</p>
    </div>
  </PatternBackground>
</template>

<script setup lang="ts">
import { Icon } from '@lychen/vue-components-core/icon';
import {
  PATTERN_BACKGROUND_DIRECTION,
  PATTERN_BACKGROUND_VARIANT,
  PatternBackground,
} from '@lychen/vue-components-core/pattern-background';
import BaseHeading from '../base-heading/BaseHeading.vue';
import { faTrowelBricks } from '@fortawesome/pro-light-svg-icons/faTrowelBricks';

defineProps<{ title?: string }>();
</script>
