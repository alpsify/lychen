<script setup lang="ts">
import { PRESETS } from '../utils/Preset';
import { cn } from '@lychen/typescript-tailwind/Cn';
import {
  TagsInputRoot,
  type TagsInputRootEmits,
  type TagsInputRootProps,
  useForwardPropsEmits,
} from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<TagsInputRootProps & { class?: HTMLAttributes['class'] }>();
const emits = defineEmits<TagsInputRootEmits>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwarded = useForwardPropsEmits(delegatedProps, emits);
</script>

<template>
  <TagsInputRoot
    v-bind="forwarded"
    :class="
      cn('flex flex-wrap gap-2 items-center px-3 py-2 text-sm', PRESETS.InputField, props.class)
    "
  >
    <slot />
  </TagsInputRoot>
</template>
