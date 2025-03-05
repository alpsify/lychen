<template>
  <DivWithBackgroundImg
    :class="cn('flex flex-col gap-2 p-6 rounded-xl group justify-between', $props.class)"
    :background-image="`${backgroundImageFolder}/${application.alias}-cover-1.webp`"
    overlay
    overlay-class="bg-on-surface dark:bg-surface opacity-25 group-hover:opacity-65 transition duration-300 ease-in-out"
  >
    <div
      class="flex flex-col gap-2 bg-primary/10 dark:bg-primary-container/20 rounded-3xl backdrop-blur-lg z-10 p-4 text-surface dark:text-on-surface"
    >
      <div class="flex flex-row justify-between self-stretch">
        <ApplicationTitle :value="application.title" /><Badge v-if="displayState">{{
          application.state
        }}</Badge>
      </div>
      <p class="opacity-80 text-balance">{{ application.description }}</p>
    </div>
    <slot name="footer" />
  </DivWithBackgroundImg>
</template>

<script setup lang="ts">
import { type Application } from '@lychen/applications-util-model/Application';
import { defineAsyncComponent, type HTMLAttributes } from 'vue';
import ApplicationTitle from './ApplicationTitle.vue';
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { DivWithBackgroundImg } from '@lychen/vue-ui-components-extra/div-with-background-img';

const Badge = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/badge/Badge.vue'));

const { displayState = false } = defineProps<{
  class?: HTMLAttributes['class'];
  application: Application;
  displayState?: boolean;
  backgroundImageFolder?: string;
}>();
</script>
