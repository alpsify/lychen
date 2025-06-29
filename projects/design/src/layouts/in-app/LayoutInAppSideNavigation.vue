<template>
  <nav :class="cn('layout-in-app-side-navigation', 'flex flex-col h-full p-3')">
    <div :class="cn('flex flex-col bg-surface-container p-4 h-full rounded-xl', props.class)">
      <slot />
    </div>
  </nav>
</template>

<script lang="ts" setup>
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { type HTMLAttributes } from 'vue';

const props = defineProps<{ class?: HTMLAttributes['class'] }>();
</script>
