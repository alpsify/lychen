<script setup lang="ts">
import { DialogTitle, type DialogTitleProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-utils/tailwind/Cn';

const props = defineProps<DialogTitleProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>

<template>
  <DialogTitle
    :class="cn('text-lg font-semibold text-foreground', props.class)"
    v-bind="delegatedProps"
  >
    <slot />
  </DialogTitle>
</template>
