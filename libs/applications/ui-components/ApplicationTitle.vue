<template>
  <p :class="cn('text-lg font-black font-lexend leading-none tracking-wide', props.class)">
    {{ value }}
  </p>
</template>

<script setup lang="ts">
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { type HTMLAttributes } from 'vue';

const props = defineProps<{ value: string; class?: HTMLAttributes['class'] }>();
</script>
