<template>
  <TagsInputItemText
    v-bind="forwardedProps"
    :class="cn('py-1 px-2 text-sm rounded bg-transparent', props.class)"
  />
</template>

<script setup lang="ts">
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { TagsInputItemText, type TagsInputItemTextProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<TagsInputItemTextProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>
