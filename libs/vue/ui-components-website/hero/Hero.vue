<template>
  <DivWithBackgroundImg
    is="header"
    v-bind="forwarded"
  >
    <div class="flex flex-col items-stretch container z-10 py-8">
      <slot />
    </div>
  </DivWithBackgroundImg>
</template>

<script lang="ts" setup>
import {
  DivWithBackgroundImg,
  type DivWithBackgroundImgProps,
} from '@lychen/vue-ui-components-extra/div-with-background-img';
import { useForwardProps } from 'reka-ui';

const props = defineProps<Omit<DivWithBackgroundImgProps, 'is'>>();
const forwarded = useForwardProps(props);
</script>

<style scoped>
.overlay {
  border-radius: inherit;
}
</style>
