<template>
  <div :class="cn(sectionSettingVariants({ variant }), props.class, 'component-section-setting')">
    <div class="flex flex-col gap-1 p-4">
      <BaseHeading variant="h2">{{ title }}</BaseHeading>
      <p class="opacity-80">{{ description }}</p>
      <div class="flex py-2 gap-2">
        <slot name="subTitle" />
      </div>
    </div>
    <div class="flex flex-col gap-8 p-4">
      <slot />
    </div>
  </div>
</template>

<script setup lang="ts">
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { sectionSettingVariants, type SectionSettingVariants } from '.';
import type { HTMLAttributes } from 'vue';
import BaseHeading from '../base-heading/BaseHeading.vue';

const props = withDefaults(
  defineProps<{
    title?: string;
    description?: string;
    variant?: SectionSettingVariants['variant'];
    class?: HTMLAttributes['class'];
  }>(),
  {
    variant: 'default',
    title: undefined,
    description: undefined,
    class: undefined,
  },
);
</script>

<style scoped>
.component-section-setting {
  border: none;

  & ~ & {
    border-top: solid 2px var(--color-surface-container);
  }
}
</style>
