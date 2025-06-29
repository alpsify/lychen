<template>
  <main :class="cn('layout-in-app-content', 'flex flex-col', props.class)">
    <slot>
      <RouterView />
    </slot>
  </main>
</template>

<script lang="ts" setup>
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { type HTMLAttributes } from 'vue';

const props = defineProps<{ class?: HTMLAttributes['class'] }>();
</script>
