<template>
  <span
    :class="cn('font-lexend text-xl font-bold leading-5 tracking-wide antialiased', props.class)"
    >lychen</span
  >
</template>

<script lang="ts" setup>
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { type HTMLAttributes } from 'vue';

const props = defineProps<{ class?: HTMLAttributes['class'] }>();
</script>
