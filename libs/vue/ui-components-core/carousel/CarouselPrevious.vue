<script setup lang="ts">
import type { WithClassAsProps } from './interface';
import Button from '../button/Button.vue';
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { useCarousel } from './useCarousel';
import { faArrowLeft } from '@fortawesome/pro-light-svg-icons/faArrowLeft';

const props = defineProps<WithClassAsProps>();

const { orientation, canScrollPrev, scrollPrev } = useCarousel();
</script>

<template>
  <Button
    :disabled="!canScrollPrev"
    :class="
      cn(
        'touch-manipulation absolute',
        orientation === 'horizontal'
          ? '-left-12 top-1/2 -translate-y-1/2'
          : '-top-12 left-1/2 -translate-x-1/2 rotate-90',
        props.class,
      )
    "
    variant="outline"
    aria-label="Précédent"
    size="sm"
    :icon="faArrowLeft"
    @click="scrollPrev"
  >
    <slot />
  </Button>
</template>
