<template>
  <TagsInputItem
    v-bind="forwardedProps"
    :class="
      cn(
        'flex items-center rounded-md pl-2 py-1 text-xs gap-2 cursor-default bg-surface-container text-on-surface-container data-[state=active]:ring-ring data-[state=active]:ring-2 data-[state=active]:ring-offset-2 ring-offset-background',
        props.class,
      )
    "
  >
    <slot />
  </TagsInputItem>
</template>

<script setup lang="ts">
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { TagsInputItem, type TagsInputItemProps, useForwardProps } from 'reka-ui';

import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<TagsInputItemProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>
