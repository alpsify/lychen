<template>
  <div class="flex flex-col gap-4 -m-6">
    <slot name="header">
      <header class="flex flex-col gap-2 px-10 py-14 bg-surface-container rounded-t-2xl">
        <slot name="title">
          <BaseHeading v-if="title">{{ title }}</BaseHeading>
        </slot>
        <slot name="description">
          <span
            v-if="description"
            class="opacity-80"
            >{{ description }}</span
          >
        </slot>
      </header>
    </slot>
    <slot />
  </div>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';

const BaseHeading = defineAsyncComponent(
  () => import('@lychen/vue-components-app/base-heading/BaseHeading.vue'),
);

defineProps<{ title?: string; description?: string }>();
</script>
