<template>
  <div
    :style="parentStyles"
    :class="cn('relative glow-border', $props.class)"
  >
    <div
      :style="childStyles"
      :class="
        cn(
          `glow-border before:absolute before:inset-0 before:aspect-square before:size-full before:rounded-[--border-radius] before:bg-[length:300%_300%] before:p-[--border-width] before:opacity-50 before:will-change-[background-position] before:content-['']`,
          'before:![-webkit-mask-composite:xor] before:![mask-composite:exclude] before:[mask:--mask-linear-gradient]',
        )
      "
    ></div>
    <slot />
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { cn } from '../lib/utils';

interface Props {
  borderRadius?: number;
  color?: string | Array<string>;
  borderWidth?: number;
  duration?: number;
  class?: string;
}

const props = withDefaults(defineProps<Props>(), {
  borderRadius: 10,
  color: '#FFF',
  borderWidth: 2,
  duration: 10,
  class: undefined,
});

const parentStyles = computed(() => {
  return { '--border-radius': `${props.borderRadius}px` };
});

const childStyles = computed(() => ({
  '--border-width': `${props.borderWidth}px`,
  '--border-radius': `${props.borderRadius}px`,
  '--glow-pulse-duration': `${props.duration}s`,
  '--mask-linear-gradient': `linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0)`,
  '--background-radial-gradient': `radial-gradient(circle, transparent, ${
    props.color instanceof Array ? props.color.join(',') : props.color
  }, transparent)`,
}));
</script>

<style scoped>
.glow-border::before {
  animation: glow-pulse var(--glow-pulse-duration) infinite linear;
  background-image: var(--background-radial-gradient);
}

@keyframes glow-pulse {
  0% {
    background-position: 0% 0%;
  }
  50% {
    background-position: 100% 100%;
  }
  100% {
    background-position: 0% 0%;
  }
}
</style>
