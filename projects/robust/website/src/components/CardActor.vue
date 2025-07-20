<template>
  <DivWithBackgroundImg
    :background-image="backgroundImage"
    class="rounded-3xl p-6 bg-surface-container text-on-surface flex flex-col gap-6 justify-end min-h-[250px] bg-cover bg-center"
    overlay
    overlay-class="bg-gradient-to-tr from-surface/80 to-surface/10"
  >
    <Title
      variant="h3"
      class="z-2"
      >{{ title }}</Title
    >
  </DivWithBackgroundImg>
</template>

<script setup lang="ts">
import Title from '@lychen/vue-components-website/title/Title.vue';
import { defineAsyncComponent } from 'vue';

const DivWithBackgroundImg = defineAsyncComponent(
  () => import('@lychen/vue-components-extra/div-with-background-img/DivWithBackgroundImg.vue'),
);

withDefaults(defineProps<{ backgroundImage?: string; title: string }>(), {
  backgroundImage: undefined,
});
</script>
