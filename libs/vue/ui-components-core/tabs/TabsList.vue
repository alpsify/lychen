<script setup lang="ts">
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { TabsList, type TabsListProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<TabsListProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>

<template>
  <TabsList
    v-bind="delegatedProps"
    :class="
      cn(
        'inline-flex items-center justify-center rounded-md bg-surface-container p-1 text-on-surface-container',
        props.class,
      )
    "
  >
    <slot />
  </TabsList>
</template>
