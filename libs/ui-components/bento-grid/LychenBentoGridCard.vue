<template>
  <div
    :key="title"
    :class="
      cn(
        'group relative col-span-3 flex flex-col justify-end overflow-hidden rounded-xl bg-surface-container-low',
        // light styles
        '[box-shadow:0_0_0_1px_rgba(0,0,0,.03),0_2px_4px_rgba(0,0,0,.05),0_12px_24px_rgba(0,0,0,.05)]',
        // dark styles
        'transform-gpu  dark:[border:1px_solid_rgba(255,255,255,.1)] dark:[box-shadow:0_-20px_80px_-20px_#ffffff1f_inset]',
        props.class,
      )
    "
  >
    <slot name="background">
      <div
        v-if="image"
        class="absolute right-0 top-0 size-full bg-cover bg-center bg-no-repeat opacity-100 transition duration-150 ease-in-out group-hover:opacity-30"
        :style="`background-image: url('${image}')`"
      ></div>
    </slot>

    <div
      class="bg-surface/30 pointer-events-none m-4 flex transform-gpu flex-col gap-1 rounded-lg p-6 backdrop-blur-md transition-all duration-300 group-hover:-translate-y-10 group-hover:bg-transparent group-hover:backdrop-blur-none"
    >
      <LychenTitle
        variant="h6"
        class="text-surface-container-on text-xl font-semibold"
      >
        {{ title }}
      </LychenTitle>
      <LychenParagraph class="text-surface-container-on/80 max-w-lg">{{
        description
      }}</LychenParagraph>
    </div>

    <div
      class="pointer-events-none absolute bottom-0 flex w-full translate-y-10 transform-gpu flex-row items-center justify-end p-4 opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100"
    >
      <LychenButton
        variant="default"
        as-child
        size="sm"
        class="pointer-events-auto"
      >
        <RouterLink
          :route-name="{ name: routeName }"
          class="flex gap-2"
        >
          {{ cta }} <LychenIcon icon="arrow-right"
        /></RouterLink>
      </LychenButton>
    </div>
    <div
      class="pointer-events-none absolute inset-0 transform-gpu transition-all duration-300 group-hover:bg-black/[.03] group-hover:dark:bg-neutral-800/10"
    />
  </div>
</template>

<script lang="ts" setup>
import LychenButton from '../button/LychenButton.vue';
import LychenIcon from '../icon/LychenIcon.vue';
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import LychenParagraph from '../paragraph/LychenParagraph.vue';
import LychenTitle from '../title/LychenTitle.vue';

const props = defineProps<{
  title: string;
  class: string;
  icon?: string;
  description: string;
  routeName: string;
  cta: string;
  image: string;
}>();
</script>
