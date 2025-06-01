<script setup lang="ts">
import { cn } from '@lychen/typescript-tailwind/Cn';
import { AccordionHeader, AccordionTrigger, type AccordionTriggerProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';
import Icon from '../icon/Icon.vue';
import { faChevronDown } from '@fortawesome/pro-light-svg-icons/faChevronDown';

const props = defineProps<AccordionTriggerProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>

<template>
  <AccordionHeader class="flex">
    <AccordionTrigger
      v-bind="delegatedProps"
      :class="
        cn(
          'flex flex-1 items-center justify-between py-4 font-medium transition-all hover:underline [&[data-state=open]>svg]:rotate-180',
          props.class,
        )
      "
    >
      <slot />
      <slot name="icon">
        <Icon
          :icon="faChevronDown"
          class="size-4 shrink-0 transition-transform duration-200"
        />
      </slot>
    </AccordionTrigger>
  </AccordionHeader>
</template>
