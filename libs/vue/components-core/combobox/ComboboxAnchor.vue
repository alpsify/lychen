<template>
  <ComboboxAnchor
    v-bind="forwarded"
    :class="cn('w-[200px]', props.class)"
  >
    <slot />
  </ComboboxAnchor>
</template>

<script setup lang="ts">
import type { ComboboxAnchorProps } from 'reka-ui';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { ComboboxAnchor, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<ComboboxAnchorProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwarded = useForwardProps(delegatedProps);
</script>
