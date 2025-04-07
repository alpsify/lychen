<template>
  <Dialog v-model:open="open">
    <DialogTrigger as-child>
      <slot />
    </DialogTrigger>
    <DialogContent
      class="bg-surface-container-high/90 text-on-surface-container md:max-w-[70%] w-full max-h-dvh"
    >
      <div class="overflow-y-auto flex flex-col gap-4">
        <DialogHeader
          v-if="landTask"
          class="flex flex-row justify-between items-center gap-10 border-b-1 border-on-surface/20 py-2"
        >
          <div class="flex flew-row items-center gap-4">
            <p>
              <span class="font-bold">{{ land.name }}</span> / Tâches
            </p>
            <Badge
              variant="outline"
              class="text-on-surface/60"
              >{{ landTask.ulid }}</Badge
            >
          </div>
          <div class="flex flew-row items-center gap-4">
            <DropdownMenuTeraLandTaskMain :land-task="landTask">
              <Button
                :icon="faEllipsisV"
                size="sm"
                variant="container-high"
              />
            </DropdownMenuTeraLandTaskMain>

            <DialogClose />
          </div>
        </DialogHeader>
        <div v-if="landTask"></div>
        <p v-if="landTask.createdAt">{{ d(landTask.createdAt, 'long') }}</p>
        <FormTeraLandTaskUpdate
          :land-task="landTask"
          :land="land"
        />
      </div>
    </DialogContent>
  </Dialog>
</template>

<script lang="ts" setup>
import {
  Dialog,
  DialogContent,
  DialogHeader,
  DialogTrigger,
} from '@lychen/vue-ui-components-core/dialog';
import { faEllipsisV } from '@fortawesome/pro-light-svg-icons/faEllipsisV';
import { Badge } from '@lychen/vue-ui-components-core/badge';
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
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';
import DropdownMenuTeraLandTaskMain from '../../dropdown-menu/DropdownMenuTeraLandTaskMain.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
const { t: tLandTask, d } = useI18nExtended({
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
