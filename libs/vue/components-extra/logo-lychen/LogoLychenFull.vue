<template>
  <div :class="cn('flex flex-row items-center justify-start gap-1', props.class)">
    <LogoLychenIconOnly :class="cn('h-[1lh]', iconClass)" />
    <LogoLychenTextOnly :class="textClass" />
  </div>
</template>

<script setup lang="ts">
import { type HTMLAttributes } from 'vue';
import LogoLychenIconOnly from './LogoLychenIconOnly.vue';
import LogoLychenTextOnly from './LogoLychenTextOnly.vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';

const props = defineProps<{
  class?: HTMLAttributes['class'];
  iconClass?: HTMLAttributes['class'];
  textClass?: HTMLAttributes['class'];
}>();
</script>
