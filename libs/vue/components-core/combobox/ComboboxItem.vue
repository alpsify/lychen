<template>
  <ComboboxItem
    v-bind="forwarded"
    :class="
      cn(
        'relative flex cursor-default gap-2 select-none justify-between items-center rounded-sm px-2 py-1.5 text-sm outline-none data-[highlighted]:bg-secondary data-[highlighted]:text-on-secondary data-[disabled]:pointer-events-none data-[disabled]:opacity-50 [&_svg]:size-4 [&_svg]:shrink-0',
        props.class,
      )
    "
  >
    <slot />
  </ComboboxItem>
</template>

<script setup lang="ts">
import type { ComboboxItemEmits, ComboboxItemProps } from 'reka-ui';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { ComboboxItem, useForwardPropsEmits } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<ComboboxItemProps & { class?: HTMLAttributes['class'] }>();
const emits = defineEmits<ComboboxItemEmits>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwarded = useForwardPropsEmits(delegatedProps, emits);
</script>
