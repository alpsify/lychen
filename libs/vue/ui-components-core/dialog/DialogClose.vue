<script setup lang="ts">
import { DialogClose, type DialogCloseProps } from 'reka-ui';
import Icon from '../icon/Icon.vue';
import { faTimes } from '@fortawesome/pro-light-svg-icons/faTimes';

const props = defineProps<DialogCloseProps>();
</script>

<template>
  <DialogClose v-bind="props">
    <slot>
      <Icon
        class="size-4 cursor-pointer"
        :icon="faTimes"
      />
      <span class="sr-only">Close</span>
    </slot>
  </DialogClose>
</template>
