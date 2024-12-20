<template>
  <LychenDivWithBackgroundImage
    is="header"
    v-bind="forwarded"
  >
    <div :class="cn('container z-10', props.class)">
      <slot /></div
  ></LychenDivWithBackgroundImage>
</template>

<script lang="ts" setup>
import LychenDivWithBackgroundImage from '../div/LychenDivWithBackgroundImage.vue';
import { DivWithBackgroundImageProps } from '../div';
import { useForwardProps } from 'radix-vue';
import { cn } from '../lib/utils';

const props = defineProps<Omit<DivWithBackgroundImageProps, 'is'>>();
const forwarded = useForwardProps(props);
</script>

<style scoped>
.overlay {
  border-radius: inherit;
}
</style>
