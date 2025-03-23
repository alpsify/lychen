<template>
  <Dialog v-model:open="open">
    <DialogTrigger as-child>
      <slot />
    </DialogTrigger>
    <DialogContent
      class="bg-surface-container-high/90 text-on-surface-container md:max-w-[50%] w-full max-h-dvh"
    >
      <div class="overflow-y-auto flex flex-col gap-4">
        <DialogHeader class="flex flex-row justify-between items-start gap-10">
          <div class="md:w-4/5 flex flex-col gap-2">
            <DialogTitle>{{ t('title') }}</DialogTitle>
            <DialogDescription>
              {{ t('description') }}
            </DialogDescription>
          </div>
          <DialogClose />
        </DialogHeader>
        <FormTeraLandMemberUpdate
          :land-member="landMember"
          :land="land"
        />
        <Separator class="bg-surface-container-highest" />
        <div class="flex flex-row gap-2 justify-end">
          <DialogTeraLandMemberDelete :land-member="landMember">
            <Button
              :text="tLandMember('action.delete.label')"
              variant="negative"
            />
          </DialogTeraLandMemberDelete>
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
  DialogDescription,
} from '@lychen/vue-ui-components-core/dialog';
import FormTeraLandMemberUpdate from '@lychen/tera-ui-components/land-member/form/FormTeraLandMemberUpdate.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import DialogClose from '@lychen/vue-ui-components-core/dialog/DialogClose.vue';
import { useEventBus } from '@vueuse/core';
import {
  landMemberDeleteSucceededEvent,
  landMemberPatchSucceededEvent,
} from '@lychen/tera-util-events/LandMemberEvents';
import { ref } from 'vue';
import {
  messages as landMemberMessages,
  TRANSLATION_KEY as LAND_MEMBER_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land-member';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { Separator } from '@lychen/vue-ui-components-core/separator';
import DialogTeraLandMemberDelete from '../delete/DialogTeraLandMemberDelete.vue';
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
const { t: tLandMember } = useI18nExtended({
  messages: landMemberMessages,
  rootKey: LAND_MEMBER_TRANSLATION_KEY,
  prefixed: true,
});

const { landMember } = defineProps<{
  landMember: components['schemas']['LandMember.jsonld'];
  land: components['schemas']['Land.jsonld'];
}>();

const open = ref(false);

const { on } = useEventBus(landMemberPatchSucceededEvent);
const { on: onDelete } = useEventBus(landMemberDeleteSucceededEvent);

on(() => {
  open.value = false;
});
onDelete(() => {
  open.value = false;
});
</script>
