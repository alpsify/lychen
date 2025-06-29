<template>
  <header
    :class="
      cn(
        'layout-in-app-header',
        'flex flex-row justify-between items-center gap-2 p-3',
        props.class,
      )
    "
  >
    <slot />
  </header>
</template>

<script lang="ts" setup>
import { cn } from '@lychen/typescript-tailwind/Cn';
import { type HTMLAttributes } from 'vue';

const props = defineProps<{ class?: HTMLAttributes['class'] }>();
</script>
