<template>
  <NavigationMenuList
    v-bind="forwardedProps"
    :class="cn('group flex flex-1 list-none items-center justify-center gap-x-1', props.class)"
  >
    <slot />
  </NavigationMenuList>
</template>

<script setup lang="ts">
import { NavigationMenuList, type NavigationMenuListProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-utils/tailwind/Cn';

const props = defineProps<NavigationMenuListProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>
