<template>
  <DrawerOverlay
    v-bind="delegatedProps"
    :class="cn('fixed inset-0 z-50 bg-black/80', props.class)"
  />
</template>

<script lang="ts" setup>
import type { DialogOverlayProps } from 'reka-ui';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { DrawerOverlay } from 'vaul-vue';
import { computed, type HtmlHTMLAttributes } from 'vue';

const props = defineProps<DialogOverlayProps & { class?: HtmlHTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>
