<template>
  <Dialog v-model:open="open">
    <DialogTrigger as-child>
      <slot />
    </DialogTrigger>
    <DialogContent
      class="bg-surface-container-high/90 text-on-surface-container md:max-w-[50%] w-full max-h-dvh overflow-y-auto gap-8"
    >
      <DialogHeader class="flex flex-row justify-between items-start gap-10">
        <div class="md:w-4/5 flex flex-col gap-2">
          <DialogTitle>{{ t('title') }}</DialogTitle>
        </div>
        <DialogClose />
      </DialogHeader>
      <FormTeraLandTaskCreate :land />
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
import FormTeraLandTaskCreate from '@lychen/tera-ui-components/land-task/forms/FormTeraLandTaskCreate.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import DialogClose from '@lychen/vue-ui-components-core/dialog/DialogClose.vue';
import { useEventBus } from '@vueuse/core';
import { landTaskPostSucceededEvent } from '@lychen/tera-util-events/LandTaskEvents';
import { ref } from 'vue';
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { land } = defineProps<{ land: components['schemas']['Land.jsonld'] }>();

const open = ref(false);

const { on } = useEventBus(landTaskPostSucceededEvent);
on(() => {
  open.value = false;
});
</script>
