<template>
  <section :class="cn('container py-10 md:py-40', props.class)"><slot></slot></section>
</template>

<script lang="ts" setup>
import { cn } from '../lib/utils';

const props = defineProps<{ class?: string }>();
</script>
