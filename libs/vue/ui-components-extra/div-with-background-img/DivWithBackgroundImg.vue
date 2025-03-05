<template>
  <component
    :is="is"
    :class="cn('relative bg-cover bg-center bg-no-repeat', props.class)"
    :style="backgroundImage ? `background-image: url(${backgroundImage});` : ''"
  >
    <div
      v-if="overlay"
      :class="cn('overlay absolute top-0 left-0 size-full z-1', overlayClass)"
    ></div>
    <slot />
  </component>
</template>

<script lang="ts" setup>
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { type DivWithBackgroundImgProps } from '.';

const props = withDefaults(defineProps<DivWithBackgroundImgProps>(), {
  is: 'div',
  overlay: false,
  backgroundImage: undefined,
  overlayClass: undefined,
  class: undefined,
});
</script>

<style scoped>
.overlay {
  border-radius: inherit;
}
</style>
