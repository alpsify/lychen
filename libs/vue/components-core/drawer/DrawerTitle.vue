<template>
  <DrawerTitle
    v-bind="delegatedProps"
    :class="cn('text-lg font-semibold leading-none tracking-tight', props.class)"
  >
    <slot />
  </DrawerTitle>
</template>

<script lang="ts" setup>
import type { DrawerTitleProps } from 'vaul-vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { DrawerTitle } from 'vaul-vue';
import { computed, type HtmlHTMLAttributes } from 'vue';

const props = defineProps<DrawerTitleProps & { class?: HtmlHTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>
