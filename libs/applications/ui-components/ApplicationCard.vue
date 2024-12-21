<template>
  <component
    :is="is"
    :class="cn('flex flex-col gap-2 p-6 rounded-xl items-start', $props.class)"
    :href="application.link"
  >
    <div class="flex flex-row justify-between self-stretch">
      <ApplicationTitle :value="application.title" /><LychenBadge v-if="displayState">{{
        application.state
      }}</LychenBadge>
    </div>
    <p class="opacity-80 text-balance">{{ application.description }}</p>
  </component>
</template>

<script setup lang="ts">
import { Application } from '@lychen/applications-util-model/Application';
import { defineAsyncComponent, type HTMLAttributes } from 'vue';
import ApplicationTitle from './ApplicationTitle.vue';
import { cn } from '@lychen/typescript-util-tailwind/Cn';

const LychenBadge = defineAsyncComponent(
  () => import('@lychen/ui-components/badge/LychenBadge.vue'),
);

const { is = 'div', displayState = false } = defineProps<{
  class?: HTMLAttributes['class'];
  is?: string;
  application: Application;
  displayState?: boolean;
}>();
</script>
