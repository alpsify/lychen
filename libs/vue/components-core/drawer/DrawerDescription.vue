<template>
  <DrawerDescription
    v-bind="delegatedProps"
    :class="cn('text-sm text-muted-foreground', props.class)"
  >
    <slot />
  </DrawerDescription>
</template>

<script lang="ts" setup>
import type { DrawerDescriptionProps } from 'vaul-vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { DrawerDescription } from 'vaul-vue';
import { computed, type HtmlHTMLAttributes } from 'vue';

const props = defineProps<DrawerDescriptionProps & { class?: HtmlHTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>
