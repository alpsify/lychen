<script setup lang="ts">
import { DialogClose, type DialogCloseProps } from 'reka-ui';
import Button from '../button/Button.vue';
import { faTimes } from '@fortawesome/pro-light-svg-icons/faTimes';

const props = defineProps<DialogCloseProps>();
</script>

<template>
  <DialogClose v-bind="props">
    <slot>
      <Button
        :icon="faTimes"
        variant="ghost"
        size="sm"
      />
      <span class="sr-only">Close</span>
    </slot>
  </DialogClose>
</template>
