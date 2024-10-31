<script setup lang="ts">
import { NavigationMenuTrigger, type NavigationMenuTriggerProps, useForwardProps } from "radix-vue";
import { computed, type HTMLAttributes } from "vue";

import LychenIcon from "../icon/LychenIcon.vue";
import { cn } from "../lib/utils";
import { navigationMenuTriggerStyle } from ".";

const props = defineProps<NavigationMenuTriggerProps & { class?: HTMLAttributes["class"] }>();

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
    <LychenIcon
      icon="chevron-down"
      class="relative top-px ml-1 size-3 transition duration-200 group-data-[state=open]:rotate-180"
      aria-hidden="true"
    />
  </NavigationMenuTrigger>
</template>
