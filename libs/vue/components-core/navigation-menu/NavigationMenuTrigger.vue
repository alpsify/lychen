<script setup lang="ts">
import { NavigationMenuTrigger, type NavigationMenuTriggerProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

import Icon from '../icon/Icon.vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { navigationMenuTriggerStyle } from '.';
import { faChevronDown } from '@fortawesome/pro-light-svg-icons/faChevronDown';

const props = defineProps<NavigationMenuTriggerProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
  <NavigationMenuTrigger
    v-bind="forwardedProps"
    :class="cn(navigationMenuTriggerStyle(), 'group', props.class)"
  >
    <slot />
    <Icon
      :icon="faChevronDown"
      class="relative top-px ml-1 size-3 transition duration-200 group-data-[state=open]:rotate-180"
      aria-hidden="true"
    />
  </NavigationMenuTrigger>
</template>
