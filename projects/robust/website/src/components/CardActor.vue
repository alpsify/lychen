<template>
  <LychenDivWithBackgroundImage
    :background-image="backgroundImage"
    class="rounded-3xl p-6 bg-surface-container text-on-surface flex flex-col gap-6 justify-end min-h-[250px] bg-cover bg-center"
    overlay
    overlay-class="bg-gradient-to-tr from-surface/80 to-surface/10"
  >
    <LychenTitle
      variant="h3"
      class="z-2"
      >{{ title }}</LychenTitle
    >
  </LychenDivWithBackgroundImage>
</template>

<script setup lang="ts">
import LychenTitle from '@lychen/ui-components/title/LychenTitle.vue';
import LychenDivWithBackgroundImage from '@lychen/ui-components/div/LychenDivWithBackgroundImage.vue';

withDefaults(defineProps<{ backgroundImage: string; title: string }>(), {
  backgroundImage: undefined,
});
</script>
