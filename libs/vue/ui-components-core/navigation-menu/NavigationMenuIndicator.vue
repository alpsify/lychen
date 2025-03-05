<script setup lang="ts">
import {
  NavigationMenuIndicator,
  type NavigationMenuIndicatorProps,
  useForwardProps,
} from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-util-tailwind/Cn';

const props = defineProps<NavigationMenuIndicatorProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
  <NavigationMenuIndicator
    v-bind="forwardedProps"
    :class="
      cn(
        'top-full z-[1] flex h-1.5 items-end justify-center overflow-hidden data-[state=visible]:animate-in data-[state=hidden]:animate-out data-[state=hidden]:fade-out data-[state=visible]:fade-in',
        props.class,
      )
    "
  >
    <div class="bg-border relative top-[60%] size-2 rotate-45 rounded-tl-sm shadow-md" />
  </NavigationMenuIndicator>
</template>
