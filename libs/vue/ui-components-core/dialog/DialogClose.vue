<script setup lang="ts">
import { DialogClose, type DialogCloseProps } from 'reka-ui';
import Icon from '../icon/Icon.vue';

const props = defineProps<DialogCloseProps>();
</script>

<template>
  <DialogClose v-bind="props">
    <slot>
      <Icon
        class="size-4 cursor-pointer"
        icon="times"
      />
      <span class="sr-only">Close</span>
    </slot>
  </DialogClose>
</template>
