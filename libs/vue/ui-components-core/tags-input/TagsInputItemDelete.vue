<script setup lang="ts">
import { faTimes } from '@fortawesome/pro-light-svg-icons/faTimes';
import Icon from '../icon/Icon.vue';
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { TagsInputItemDelete, type TagsInputItemDeleteProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<TagsInputItemDeleteProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
  <TagsInputItemDelete
    v-bind="forwardedProps"
    :class="cn('flex rounded bg-transparent mr-1', props.class)"
  >
    <slot>
      <Icon
        :icon="faTimes"
        class="w-4 h-4"
      />
    </slot>
  </TagsInputItemDelete>
</template>
