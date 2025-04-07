<template>
  <Dialog v-model:open="open">
    <DialogTrigger as-child>
      <slot />
    </DialogTrigger>
    <DialogContent
      class="bg-surface-container-high/90 text-on-surface-container md:max-w-[70%] w-full max-h-dvh"
    >
      <div class="overflow-y-auto flex flex-col gap-4">
        <DialogHeader class="flex flex-row justify-between items-start gap-10">
          <div class="md:w-4/5 flex flex-col gap-2">
            <DialogTitle>{{ t('title') }}</DialogTitle>
          </div>
          <DialogClose />
        </DialogHeader>
        <FormTeraLandTaskUpdate
          :land-task="landTask"
          :land="land"
        />
        <Separator class="bg-surface-container-highest" />
        <div class="flex flex-row gap-2 justify-end">
          <DialogTeraLandTaskDelete :land-task="landTask">
            <Button
              :label="tLandTask('action.delete.label')"
              variant="negative"
            />
          </DialogTeraLandTaskDelete>
        </div>
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
import FormTeraLandTaskUpdate from '@lychen/tera-ui-components/land-task/forms/FormTeraLandTaskUpdate.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import DialogClose from '@lychen/vue-ui-components-core/dialog/DialogClose.vue';
import { useEventBus } from '@vueuse/core';
import {
  landTaskDeleteSucceededEvent,
  landTaskPatchSucceededEvent,
} from '@lychen/tera-util-events/LandTaskEvents';
import { ref } from 'vue';
import {
  messages as landTaskMessages,
  TRANSLATION_KEY as LAND_TASK_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land-task';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { Separator } from '@lychen/vue-ui-components-core/separator';
import DialogTeraLandTaskDelete from '../delete/DialogTeraLandTaskDelete.vue';
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
const { t: tLandTask } = useI18nExtended({
  messages: landTaskMessages,
  rootKey: LAND_TASK_TRANSLATION_KEY,
  prefixed: true,
});

const { landTask } = defineProps<{
  landTask: components['schemas']['LandTask.jsonld'];
  land: components['schemas']['Land.jsonld'];
}>();

const open = ref(false);

const { on } = useEventBus(landTaskPatchSucceededEvent);
const { on: onDelete } = useEventBus(landTaskDeleteSucceededEvent);

on(() => {
  open.value = false;
});
onDelete(() => {
  open.value = false;
});
</script>
