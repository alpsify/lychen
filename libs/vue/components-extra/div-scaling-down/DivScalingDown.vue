<template>
  <div :class="cn(`component ${scaledDown ? 'scaled-down' : ''}`, props.class)">
    <slot />
  </div>
</template>

<script setup lang="ts">
import { cn } from '@lychen/typescript-tailwind/Cn';
import { useScroll } from '@vueuse/core';
import { ref, toRefs, watch, type HTMLAttributes } from 'vue';

const props = withDefaults(
  defineProps<{
    class?: HTMLAttributes['class'];
    scrollYOffset?: number;
    scrollYOffsetGoingUp?: number;
    scaleRatio?: number;
    duration?: number;
    endBorderRadius?: string;
  }>(),
  {
    class: undefined,
    scrollYOffset: 10,
    scrollYOffsetGoingUp: 60,
    scaleRatio: 0.9,
    duration: 1200,
    endBorderRadius: '50px',
  },
);

const { y, directions } = useScroll(typeof window !== 'undefined' ? window : undefined);
const { top: toTop, bottom: toBottom } = toRefs(directions);
const scaledDown = ref(false);

watch(
  () => y.value,
  () => {
    if (toBottom.value) {
      if (y.value > props.scrollYOffset) {
        scaledDown.value = true;
        return;
      }
    }

    if (toTop.value) {
      if (y.value < props.scrollYOffsetGoingUp) {
        scaledDown.value = false;
        return;
      }
    }

    scaledDown.value = false;
  },
);
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
