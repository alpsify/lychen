<template>
  <li
    role="presentation"
    aria-hidden="true"
    :class="cn('[&>svg]:w-3.5 [&>svg]:h-3.5', props.class)"
  >
    <slot>
      <IconChevronRight />
    </slot>
  </li>
</template>

<script lang="ts" setup>
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import IconChevronRight from '@lychen/vue-icons/IconChevronRight.vue';

const props = defineProps<{
  class?: HTMLAttributes['class'];
}>();
</script>
