<template>
  <div class="flex flex-col gap-2">
    <div class="flex flex-row justify-between">
      <BaseHeading
        v-if="title"
        variant="h2"
        class="opacity-60"
        >{{ title }}</BaseHeading
      >
      <ButtonPersonaMore
        :persona-id="personaId"
        :template-ref-for-download="htmlId"
      />
    </div>
    <slot />
  </div>
</template>

<script setup lang="ts">
import BaseHeading from '@lychen/vue-ui-components-app/base-heading/BaseHeading.vue';
import ButtonPersonaMore from './ButtonPersonaMore.vue';

interface Props {
  personaId: string;
  htmlId: string;
  title?: string;
}

defineProps<Props>();
</script>

<style lang="css" scoped>
h5 {
  opacity: 0.6;
}
</style>
