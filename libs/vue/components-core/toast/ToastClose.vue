<template>
  <ToastClose
    v-bind="delegatedProps"
    :class="
      cn(
        'absolute right-2 top-2 rounded-md p-1 text-foreground/50 opacity-0 transition-opacity hover:text-foreground focus:opacity-100 focus:outline-none focus:ring-2 group-hover:opacity-100 group-[.destructive]:text-red-300 group-[.destructive]:hover:text-red-50 group-[.destructive]:focus:ring-red-400 group-[.destructive]:focus:ring-offset-red-600',
        props.class,
      )
    "
  >
    <Icon
      :icon="faTimes"
      class="h-4 w-4"
    />
  </ToastClose>
</template>

<script setup lang="ts">
import { Icon } from '../icon';
import { faTimes } from '@fortawesome/pro-light-svg-icons';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { ToastClose, type ToastCloseProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<
  ToastCloseProps & {
    class?: HTMLAttributes['class'];
  }
>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>
