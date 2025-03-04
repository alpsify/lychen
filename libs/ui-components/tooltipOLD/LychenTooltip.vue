<script setup lang="ts">
import {
  TooltipRoot,
  type TooltipRootEmits,
  type TooltipRootProps,
  useForwardPropsEmits,
} from 'radix-vue';

import LychenTooltipContent from './LychenTooltipContent.vue';
import LychenTooltipTrigger from './LychenTooltipTrigger.vue';

interface Props extends TooltipRootProps {
  content: string;
}

const props = defineProps<Props>();
const emits = defineEmits<TooltipRootEmits>();

const forwarded = useForwardPropsEmits(props, emits);
</script>

<template>
  <TooltipRoot v-bind="forwarded">
    <LychenTooltipTrigger as-child>
      <slot />
    </LychenTooltipTrigger>
    <LychenTooltipContent>
      {{ content }}
    </LychenTooltipContent>
  </TooltipRoot>
</template>
