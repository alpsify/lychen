<template>
  <DialogClose v-bind="props">
    <slot>
      <Button
        variant="ghost"
        size="sm"
      >
        <template #icon>
          <IconTimes />
        </template>
      </Button>
      <span class="sr-only">Close</span>
    </slot>
  </DialogClose>
</template>

<script setup lang="ts">
import { DialogClose, type DialogCloseProps } from 'reka-ui';
import Button from '../button/Button.vue';
import IconTimes from '@lychen/vue-icons/IconTimes.vue';

const props = defineProps<DialogCloseProps>();
</script>
