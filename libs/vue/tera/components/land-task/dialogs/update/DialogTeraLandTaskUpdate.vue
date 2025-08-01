<template>
  <Dialog v-model:open="open">
    <DialogTrigger as-child>
      <slot />
    </DialogTrigger>
    <DialogContent
      :id="`dialog-content-${landTask.ulid}`"
      class="md:max-w-[70%] w-full max-h-dvh"
    >
      <div class="overflow-y-auto flex flex-col gap-4">
        <DialogHeader
          v-if="landTask"
          class="flex flex-row justify-between items-center gap-10 border-b-1 border-on-surface/20 py-2"
        >
          <div class="flex flew-row items-center gap-4">
            <p>
              <span
                v-if="land"
                class="font-bold"
                >{{ land.name }}</span
              >
              / Tâches
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
                variant="ghost"
              />
            </DropdownMenuTeraLandTaskMain>

            <DialogClose
              as-child
              @click="onClose()"
            />
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
  DialogClose,
  DialogTrigger,
} from '@lychen/vue-components-core/dialog';
import { faEllipsisV } from '@fortawesome/pro-light-svg-icons/faEllipsisV';
import { Badge } from '@lychen/vue-components-core/badge';
import FormTeraLandTaskUpdate from '@lychen/vue-tera/components/land-task/forms/FormTeraLandTaskUpdate.vue';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import { useEventBus } from '@vueuse/core';
import {
  EVENT_landTaskDeleteSucceeded,
  EVENT_landTaskPatchSucceeded,
} from '@lychen/vue-tera/events/LandTaskEvents';
import { inject, watch } from 'vue';
import {
  messages as landTaskMessages,
  TRANSLATION_KEY as LAND_TASK_TRANSLATION_KEY,
} from '@lychen/i18n-tera/land-task';
import Button from '@lychen/vue-components-core/button/Button.vue';
import type { components } from '@lychen/typescript-tera-api-sdk/generated/tera-api';
import DropdownMenuTeraLandTaskMain from '../../dropdown-menu/DropdownMenuTeraLandTaskMain.vue';
import { useRouter } from 'vue-router';
import { INJECTKEY_DIALOG_LAND_TASK_UPDATE_LAND } from '.';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
const { t: tLandTask, d } = useI18nExtended({
  messages: landTaskMessages,
  rootKey: LAND_TASK_TRANSLATION_KEY,
  prefixed: true,
});

const { landTask } = defineProps<{
  landTask: components['schemas']['LandTask.jsonld'];
}>();

const open = defineModel<boolean>('open');

const { on } = useEventBus(EVENT_landTaskPatchSucceeded);
const { on: onDelete } = useEventBus(EVENT_landTaskDeleteSucceeded);
const land = inject(INJECTKEY_DIALOG_LAND_TASK_UPDATE_LAND);

on(() => {
  open.value = false;
});

onDelete(() => {
  open.value = false;
});

const router = useRouter();

watch(
  open,
  (newValue) => {
    if (newValue && landTask.ulid) {
      router.push({ query: { taskId: landTask.ulid } });
    }
  },
  { immediate: true },
);

function onClose() {
  router.push({ query: {} });
  open.value = false;
}
</script>
