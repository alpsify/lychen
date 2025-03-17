<template>
  <Dialog v-model:open="open">
    <DialogTrigger as-child>
      <slot />
    </DialogTrigger>
    <DialogContent
      class="bg-surface-container-high/70 backdrop-blur-xl text-on-surface-container md:max-w-[50%] w-full max-h-dvh overflow-y-auto gap-8"
    >
      <DialogHeader class="flex flex-row justify-between items-start gap-10">
        <div class="md:w-4/5 flex flex-col gap-2">
          <DialogTitle>{{ t('title') }}</DialogTitle>
          <DialogDescription>
            {{ t('description') }}
          </DialogDescription>
        </div>
        <DialogClose />
      </DialogHeader>
      <FormTeraLandRoleUpdate :land-role="landRole" />
      <Separator class="bg-surface-container-highest" />
      <div class="flex flex-row gap-2 justify-end">
        <DialogTeraLandRoleDelete :land-role="landRole">
          <Button
            :text="tLandRole('action.delete.label')"
            variant="negative"
          />
        </DialogTeraLandRoleDelete>
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
  DialogDescription,
} from '@lychen/vue-ui-components-core/dialog';
import FormTeraLandRoleUpdate from '@lychen/tera-ui-components/land-role/forms/FormTeraLandRoleUpdate.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import DialogClose from '@lychen/vue-ui-components-core/dialog/DialogClose.vue';
import type { LandRoleJsonld } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { useEventBus } from '@vueuse/core';
import {
  landRoleDeleteSucceededEvent,
  landRolePatchSucceededEvent,
} from '@lychen/tera-util-events/LandRoleEvents';
import { ref } from 'vue';
import {
  messages as landRoleMessages,
  TRANSLATION_KEY as LAND_ROLE_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land-role';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { Separator } from '@lychen/vue-ui-components-core/separator';
import DialogTeraLandRoleDelete from '../delete/DialogTeraLandRoleDelete.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
const { t: tLandRole } = useI18nExtended({
  messages: landRoleMessages,
  rootKey: LAND_ROLE_TRANSLATION_KEY,
  prefixed: true,
});

const { landRole } = defineProps<{ landRole: LandRoleJsonld }>();

const open = ref(false);

const { on } = useEventBus(landRolePatchSucceededEvent);
const { on: onDelete } = useEventBus(landRoleDeleteSucceededEvent);

on(() => {
  open.value = false;
});

onDelete(() => {
  open.value = false;
});
</script>
