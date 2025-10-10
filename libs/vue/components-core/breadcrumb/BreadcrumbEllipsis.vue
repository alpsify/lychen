<template>
  <span
    role="presentation"
    aria-hidden="true"
    :class="cn('flex h-9 w-9 items-center justify-center', props.class)"
  >
    <slot>
      <IconEllipsis class="h-4 w-4" />
    </slot>
    <span class="sr-only">More</span>
  </span>
</template>

<script lang="ts" setup>
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import IconEllipsis from '@lychen/vue-icons/IconEllipsis.vue';

const props = defineProps<{
  class?: HTMLAttributes['class'];
}>();
</script>
