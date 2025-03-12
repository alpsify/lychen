<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { AvatarRoot } from 'reka-ui';
import { avatarVariant, type AvatarVariants } from '.';

const props = withDefaults(
  defineProps<{
    class?: HTMLAttributes['class'];
    size?: AvatarVariants['size'];
    shape?: AvatarVariants['shape'];
  }>(),
  {
    size: 'sm',
    shape: 'circle',
    class: undefined,
  },
);
</script>

<template>
  <AvatarRoot :class="cn(avatarVariant({ size, shape }), props.class)">
    <slot />
  </AvatarRoot>
</template>
