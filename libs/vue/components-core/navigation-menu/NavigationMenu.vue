<template>
  <NavigationMenuRoot
    v-bind="forwarded"
    :class="cn('relative z-10 flex max-w-max flex-1 items-center justify-center', props.class)"
  >
    <slot />
    <NavigationMenuViewport />
  </NavigationMenuRoot>
</template>

<script setup lang="ts">
import {
  NavigationMenuRoot,
  type NavigationMenuRootEmits,
  type NavigationMenuRootProps,
  useForwardPropsEmits,
} from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import NavigationMenuViewport from './NavigationMenuViewport.vue';

const props = defineProps<NavigationMenuRootProps & { class?: HTMLAttributes['class'] }>();

const emits = defineEmits<NavigationMenuRootEmits>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwarded = useForwardPropsEmits(delegatedProps, emits);
</script>
