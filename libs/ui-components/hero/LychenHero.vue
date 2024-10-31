<template>
  <header
    class="relative bg-center bg-no-repeat bg-cover"
    :style="backgroundImage ? `background-image: url(${backgroundImage});` : ''"
  >
    <div
      v-if="overlay"
      :class="cn('absolute top-0 left-0 size-full', overlayClass)"
    ></div>
    <div :class="cn('container py-8 min-h-dvh md:min-h-[80dvh] z-10', props.class)">
      <slot></slot>
    </div>
  </header>
</template>

<script lang="ts" setup>
import { HTMLAttributes } from 'vue';

import { cn } from '../lib/utils';

interface Props {
  class?: HTMLAttributes['class'];
  overlayClass?: HTMLAttributes['class'];
  backgroundImage?: string;
  overlay?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
  overlay: false,
  backgroundImage: undefined,
  overlayClass: undefined,
  class: undefined,
});
</script>
