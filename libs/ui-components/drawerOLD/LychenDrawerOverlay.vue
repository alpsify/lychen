<script lang="ts" setup>
import type { DialogOverlayProps } from 'radix-vue';
import { DrawerOverlay } from 'vaul-vue';
import { computed, type HtmlHTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-util-tailwind/Cn';

const props = defineProps<DialogOverlayProps & { class?: HtmlHTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>

<template>
  <DrawerOverlay
    v-bind="delegatedProps"
    :class="cn('fixed inset-0 z-50 bg-surface/70', props.class)"
  />
</template>
