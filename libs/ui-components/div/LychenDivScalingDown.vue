<template>
  <div :class="cn(`component ${y > scrollYOffset ? 'scaled-down' : ''}`, props.class)">
    <slot />
  </div>
</template>

<script setup lang="ts">
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { useWindowScroll } from '@vueuse/core';
import { type HTMLAttributes } from 'vue';

const props = withDefaults(
  defineProps<{
    class?: HTMLAttributes['class'];
    scrollYOffset?: number;
    scaleRatio?: number;
    duration?: number;
    endBorderRadius?: string;
  }>(),
  {
    class: undefined,
    scrollYOffset: 10,
    scaleRatio: 0.9,
    duration: 1200,
    endBorderRadius: '50px',
  },
);

const { y } = useWindowScroll();
</script>

<style scoped>
.component {
  --time: v-bind('props.duration + "ms"');
  top: 0;
  scale: 1;
  transition: all var(--time) ease-in-out;
  &:deep(> *:first-child) {
    border-radius: 0px;
    transition: all var(--time) ease-in-out;
  }
}

.component.scaled-down {
  scale: v-bind('props.scaleRatio');
  &:deep(> *:first-child) {
    border-radius: v-bind('props.endBorderRadius');
  }
}
</style>
