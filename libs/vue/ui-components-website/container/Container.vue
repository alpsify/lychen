<template>
  <section :class="wrapperClass">
    <div :class="cn('container py-10 md:py-40', props.class)">
      <slot />
    </div>
  </section>
</template>

<script lang="ts" setup>
import { cn } from '@lychen/typescript-util-tailwind/Cn';

const props = defineProps<{ class?: string; wrapperClass?: string }>();
</script>
