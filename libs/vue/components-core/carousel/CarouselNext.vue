<script setup lang="ts">
import type { WithClassAsProps } from './interface';
import Button from '../button/Button.vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { useCarousel } from './useCarousel';
import IconArrowRight from '@lychen/vue-icons/IconArrowRight.vue';

const props = defineProps<WithClassAsProps>();

const { orientation, canScrollNext, scrollNext } = useCarousel();
</script>

<template>
  <Button
    :disabled="!canScrollNext"
    :class="
      cn(
        'touch-manipulation absolute p-0',
        orientation === 'horizontal'
          ? '-right-12 top-1/2 -translate-y-1/2'
          : '-bottom-12 left-1/2 -translate-x-1/2 rotate-90',
        props.class,
      )
    "
    size="sm"
    variant="outline"
    aria-label="Suivant"
    icon-only
    @click="scrollNext"
  >
    <template #icon>
      <IconArrowRight />
    </template>
    <slot />
  </Button>
</template>
