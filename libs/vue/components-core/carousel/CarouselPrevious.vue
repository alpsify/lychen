<script setup lang="ts">
import type { WithClassAsProps } from './interface';
import Button from '../button/Button.vue';
import { cn } from '@lychen/typescript-tailwind/Cn';
import { useCarousel } from './useCarousel';
import IconArrowLeft from '@lychen/vue-icons/IconArrowLeft.vue';

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
    icon-only
    @click="scrollPrev"
  >
    <template #icon>
      <IconArrowLeft />
    </template>
    <slot />
  </Button>
</template>
