<template>
  <div
    :class="
      cn(
        'border-3 border-surface bg-surface-container-low absolute top-6 -right-4 h-6 w-6 rounded-full cursor-pointer flex items-center justify-center hover:bg-surface-container-highest',
        props.class,
      )
    "
    @click="expanded = !expanded"
  >
    <IconChevronLeft
      class="text-xs"
      :class="{
        'rotate-180': !expanded,
      }"
    />
  </div>
</template>

<script lang="ts" setup>
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import IconChevronLeft from '@lychen/vue-icons/IconChevronLeft.vue';
import { inject, type HTMLAttributes } from 'vue';
import { INJECTION_KEY_NAVIGATION_EXPANDED } from '.';

const props = defineProps<{ class?: HTMLAttributes['class'] }>();

const expanded = inject(INJECTION_KEY_NAVIGATION_EXPANDED);
</script>
