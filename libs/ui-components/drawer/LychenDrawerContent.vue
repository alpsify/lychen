<script lang="ts" setup>
import type { DialogContentEmits, DialogContentProps } from 'radix-vue';
import { useForwardPropsEmits } from 'radix-vue';
import { DrawerContent, DrawerPortal } from 'vaul-vue';
import type { HtmlHTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-util-tailwind/Cn';
import DrawerOverlay from './LychenDrawerOverlay.vue';

const props = defineProps<DialogContentProps & { class?: HtmlHTMLAttributes['class'] }>();
const emits = defineEmits<DialogContentEmits>();

const forwarded = useForwardPropsEmits(props, emits);
</script>

<template>
  <DrawerPortal>
    <DrawerOverlay />
    <DrawerContent
      v-bind="forwarded"
      :class="
        cn(
          'fixed inset-x-0 bottom-0 z-50 mt-24 flex h-auto flex-col rounded-t-3xl bg-surface container',
          props.class,
        )
      "
    >
      <div class="bg-muted mx-auto mt-4 h-2 w-[100px] rounded-full" />
      <slot />
    </DrawerContent>
  </DrawerPortal>
</template>
