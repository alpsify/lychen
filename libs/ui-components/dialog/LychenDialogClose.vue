<script setup lang="ts">
import { DialogClose, type DialogCloseProps } from 'radix-vue';
import LychenIcon from '../icon/LychenIcon.vue';

const props = defineProps<DialogCloseProps>();
</script>

<template>
  <DialogClose v-bind="props">
    <slot>
      <LychenIcon
        class="size-4 cursor-pointer"
        icon="times"
      />
      <span class="sr-only">Close</span>
    </slot>
  </DialogClose>
</template>
