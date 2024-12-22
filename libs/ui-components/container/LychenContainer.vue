<template>
  <section :class="cn('container py-10 md:py-40', props.class)"><slot></slot></section>
</template>

<script lang="ts" setup>
import { cn } from '@lychen/typescript-util-tailwind/Cn';

const props = defineProps<{ class?: string }>();
</script>
