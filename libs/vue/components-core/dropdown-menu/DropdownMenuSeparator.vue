<template>
  <DropdownMenuSeparator
    v-bind="delegatedProps"
    :class="cn('-mx-1 my-1 h-px bg-on-surface/10', props.class)"
  />
</template>

<script setup lang="ts">
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { DropdownMenuSeparator, type DropdownMenuSeparatorProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<
  DropdownMenuSeparatorProps & {
    class?: HTMLAttributes['class'];
  }
>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>
