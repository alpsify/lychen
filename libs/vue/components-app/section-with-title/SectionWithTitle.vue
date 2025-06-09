<template>
  <section class="flex flex-col gap-6">
    <slot name="title">
      <BaseHeading variant="h1">{{ title }}</BaseHeading>
    </slot>
    <slot />
  </section>
</template>

<script lang="ts" setup>
import { BaseHeading } from '@lychen/vue-components-app/base-heading';

defineProps<{ title?: string }>();
</script>

<style lang="css" scoped></style>
