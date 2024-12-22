<template>
  <LychenDivWithBackgroundImage
    is="header"
    v-bind="forwarded"
  >
    <div class="flex flex-col items-stretch container z-10 py-8">
      <slot /></div
  ></LychenDivWithBackgroundImage>
</template>

<script lang="ts" setup>
import LychenDivWithBackgroundImage from '../div/LychenDivWithBackgroundImage.vue';
import { DivWithBackgroundImageProps } from '../div';
import { useForwardProps } from 'radix-vue';

const props = defineProps<Omit<DivWithBackgroundImageProps, 'is'>>();
const forwarded = useForwardProps(props);
</script>

<style scoped>
.overlay {
  border-radius: inherit;
}
</style>
