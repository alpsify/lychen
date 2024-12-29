<template>
  <div :class="cn('flex flex-row items-center justify-start gap-1', props.class)">
    <LychenLogoIconOnly :class="cn('h-[1lh]', iconClass)" />
    <LychenLogoTextOnly :class="textClass" />
  </div>
</template>

<script setup lang="ts">
import { type HTMLAttributes } from 'vue';
import LychenLogoIconOnly from './LychenLogoIconOnly.vue';
import LychenLogoTextOnly from './LychenLogoTextOnly.vue';
import { cn } from '@lychen/typescript-util-tailwind/Cn';

const props = defineProps<{
  class?: HTMLAttributes['class'];
  iconClass?: HTMLAttributes['class'];
  textClass?: HTMLAttributes['class'];
}>();
</script>
