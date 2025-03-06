<template>
  <section class="grid grid-cols-[2fr_1fr] grid-rows-1 h-full">
    <div :class="cn('flex flex-col gap-4', mainClass)">
      <h1 v-if="title">{{ title }}</h1>
      <slot name="main" />
    </div>
    <div
      :class="
        cn('rounded-xl min-h-full bg-secondary-container text-on-seocndary-container', sideClass)
      "
    >
      <slot name="side"></slot>
    </div>
  </section>
</template>

<script lang="ts" setup>
import { cn } from '@lychen/typescript-util-tailwind/Cn';

defineProps<{ title?: string; mainClass?: string; sideClass?: string }>();
</script>

<style lang="css" scoped></style>
