<template>
  <PatternBackground
    :direction="PATTERN_BACKGROUND_DIRECTION.TopRight"
    :variant="PATTERN_BACKGROUND_VARIANT.Grid"
    class="flex flex-col gap-4 p-20 rounded-3xl bg-surface-container size-full justify-center items-center"
  >
    <Icon
      :icon="faConstruction"
      size="2xl"
    />
    En cours de développement
  </PatternBackground>
</template>

<script setup lang="ts">
import { Icon } from '@lychen/vue-ui-components-core/icon';
import { faConstruction } from '@fortawesome/pro-light-svg-icons/faConstruction';
import {
  PATTERN_BACKGROUND_DIRECTION,
  PATTERN_BACKGROUND_VARIANT,
  PatternBackground,
} from '@lychen/vue-ui-components-core/pattern-background';
</script>
