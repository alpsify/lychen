<template>
  <LychenDivWithBackgroundImage
    :class="cn('flex flex-col gap-2 p-6 rounded-xl items-start', $props.class)"
    :background-image="`${backgroundImageFolder}/${application.alias}-cover-1.webp`"
    overlay
    overlay-class="bg-surface-on dark:bg-surface opacity-25"
  >
    <div
      class="flex flex-col gap-2 bg-primary/10 dark:bg-primary-container/20 rounded-3xl backdrop-blur-lg z-10 p-4 text-surface dark:text-surface-on"
    >
      <div class="flex flex-row justify-between self-stretch">
        <ApplicationTitle :value="application.title" /><LychenBadge v-if="displayState">{{
          application.state
        }}</LychenBadge>
      </div>
      <p class="opacity-80 text-balance">{{ application.description }}</p>
    </div>
  </LychenDivWithBackgroundImage>
</template>

<script setup lang="ts">
import { Application } from '@lychen/applications-util-model/Application';
import { defineAsyncComponent, type HTMLAttributes } from 'vue';
import ApplicationTitle from './ApplicationTitle.vue';
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import LychenDivWithBackgroundImage from '@lychen/ui-components/div/LychenDivWithBackgroundImage.vue';

const LychenBadge = defineAsyncComponent(
  () => import('@lychen/ui-components/badge/LychenBadge.vue'),
);

const { displayState = false } = defineProps<{
  class?: HTMLAttributes['class'];
  application: Application;
  displayState?: boolean;
  backgroundImageFolder?: string;
}>();
</script>
