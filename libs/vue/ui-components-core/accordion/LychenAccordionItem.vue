<script setup lang="ts">
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { AccordionItem, type AccordionItemProps, useForwardProps } from 'radix-vue';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<AccordionItemProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
  <AccordionItem
    v-bind="forwardedProps"
    :class="cn(props.class)"
  >
    <slot />
  </AccordionItem>
</template>
