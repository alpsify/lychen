<template>
  <DivWithBackgroundImg
    :class="cn('flex flex-col gap-2 p-6 rounded-xl group justify-between', $props.class)"
    :background-image="`${backgroundImageFolder}/${application.alias}-cover-1.webp`"
    overlay
    data-theme="light"
    overlay-class="bg-on-surface opacity-30 group-hover:opacity-15 transition duration-300 ease-in-out"
  >
    <div
      class="flex flex-col gap-2 bg-surface/80 rounded-3xl backdrop-blur-lg z-10 p-4 text-on-surface"
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
import { type Application } from '@lychen/applications-model/Application';
import { defineAsyncComponent, type HTMLAttributes } from 'vue';
import ApplicationTitle from './ApplicationTitle.vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';

const DivWithBackgroundImg = defineAsyncComponent(
  () => import('@lychen/vue-components-extra/div-with-background-img/DivWithBackgroundImg.vue'),
);

const Badge = defineAsyncComponent(() => import('@lychen/vue-components-core/badge/Badge.vue'));

const { displayState = false } = defineProps<{
  class?: HTMLAttributes['class'];
  application: Application;
  displayState?: boolean;
  backgroundImageFolder?: string;
}>();
</script>
