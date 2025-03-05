<script setup lang="ts">
import type { WithClassAsProps } from './interface';
import Button from '../button/Button.vue';
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { useCarousel } from './useCarousel';
import Icon from '../icon/Icon.vue';
import { faArrowRight } from '@fortawesome/pro-light-svg-icons/faArrowRight';

const props = defineProps<WithClassAsProps>();

const { orientation, canScrollNext, scrollNext } = useCarousel();
</script>

<template>
  <Button
    :disabled="!canScrollNext"
    :class="
      cn(
        'touch-manipulation absolute h-8 w-8 rounded-full p-0',
        orientation === 'horizontal'
          ? '-right-12 top-1/2 -translate-y-1/2'
          : '-bottom-12 left-1/2 -translate-x-1/2 rotate-90',
        props.class,
      )
    "
    variant="secondary"
    aria-label="Suivant"
    @click="scrollNext"
  >
    <slot>
      <Icon
        :icon="faArrowRight"
        class="size-4 text-current"
      />
    </slot>
  </Button>
</template>
