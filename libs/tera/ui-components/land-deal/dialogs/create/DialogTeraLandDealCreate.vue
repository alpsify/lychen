<template>
  <Dialog v-model:open="open">
    <DialogTrigger as-child>
      <slot />
    </DialogTrigger>
    <DialogContent
      class="bg-surface-container-high/90 text-on-surface-container md:max-w-[50%] w-full max-h-dvh"
    >
      <DialogHeader class="flex flex-row justify-between items-center gap-10">
        <div class="flex flex-col gap-2">
          <DialogTitle>Partage pour le jardin {{ land.name }}</DialogTitle>
        </div>
        <div class="flex flex-row gap-2">
          <DialogClose />
        </div>
      </DialogHeader>
      <DialogDescription> Description </DialogDescription>
      <div class="flex flex-row gap-4 justify-end">
        <Button label="Envoyer" />
      </div>
    </DialogContent>
  </Dialog>
</template>

<script lang="ts" setup>
import {
  Dialog,
  DialogContent,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@lychen/vue-ui-components-core/dialog';
import DialogDescription from '@lychen/vue-ui-components-core/dialog/DialogDescription.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import DialogClose from '@lychen/vue-ui-components-core/dialog/DialogClose.vue';
import { ref } from 'vue';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

defineProps<{
  land?: {
    name: string;
    altitude: number;
    surface: number;
    address: {
      city: string;
    };
  };
}>();

const open = ref(false);
</script>
