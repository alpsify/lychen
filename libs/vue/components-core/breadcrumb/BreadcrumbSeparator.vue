<script lang="ts" setup>
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-tailwind/Cn';
import Icon from '../icon/Icon.vue';
import { faChevronRight } from '@fortawesome/pro-light-svg-icons/faChevronRight';

const props = defineProps<{
  class?: HTMLAttributes['class'];
}>();
</script>

<template>
  <li
    role="presentation"
    aria-hidden="true"
    :class="cn('[&>svg]:w-3.5 [&>svg]:h-3.5', props.class)"
  >
    <slot>
      <Icon :icon="faChevronRight" />
    </slot>
  </li>
</template>
