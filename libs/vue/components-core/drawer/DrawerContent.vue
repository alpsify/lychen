<template>
  <DrawerPortal>
    <DrawerOverlay />
    <DrawerContent
      v-bind="forwarded"
      :class="
        cn(
          'fixed inset-x-0 bottom-0 z-50 mt-24 flex h-auto flex-col rounded-t-[10px] border bg-background',
          props.class,
        )
      "
    >
      <div class="mx-auto mt-4 h-2 w-[100px] rounded-full bg-muted" />
      <slot />
    </DrawerContent>
  </DrawerPortal>
</template>

<script lang="ts" setup>
import type { DialogContentEmits, DialogContentProps } from 'reka-ui';
import type { HtmlHTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { useForwardPropsEmits } from 'reka-ui';
import { DrawerContent, DrawerPortal } from 'vaul-vue';
import DrawerOverlay from './DrawerOverlay.vue';

const props = defineProps<DialogContentProps & { class?: HtmlHTMLAttributes['class'] }>();
const emits = defineEmits<DialogContentEmits>();

const forwarded = useForwardPropsEmits(props, emits);
</script>
