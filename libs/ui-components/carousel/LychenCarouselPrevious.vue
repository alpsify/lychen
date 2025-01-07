<script setup lang="ts">
import type { WithClassAsProps } from './interface';
import LychenButton from '../button/LychenButton.vue';
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { useLychenCarousel } from './useLychenCarousel';
import LychenIcon from '../icon/LychenIcon.vue';

const props = defineProps<WithClassAsProps>();

const { orientation, canScrollPrev, scrollPrev } = useLychenCarousel();
</script>

<template>
  <LychenButton
    :disabled="!canScrollPrev"
    :class="
      cn(
        'touch-manipulation absolute h-8 w-8 rounded-full p-0',
        orientation === 'horizontal'
          ? '-left-12 top-1/2 -translate-y-1/2'
          : '-top-12 left-1/2 -translate-x-1/2 rotate-90',
        props.class,
      )
    "
    variant="secondary"
    aria-label="Précédent"
    @click="scrollPrev"
  >
    <slot>
      <LychenIcon
        icon="arrow-left"
        class="size-4 text-current"
      />
    </slot>
  </LychenButton>
</template>
