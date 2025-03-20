<template>
  <Dialog v-model:open="open">
    <DialogTrigger as-child>
      <slot />
    </DialogTrigger>
    <DialogContent
      class="bg-surface-container-high/80 text-on-surface-container md:max-w-[50%] w-full max-h-dvh overflow-y-auto gap-8"
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
      <FormTeraLandMemberInvitationUpdate
        :land-member-invitation="landMemberInvitation"
        :land="land"
      />
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
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import DialogClose from '@lychen/vue-ui-components-core/dialog/DialogClose.vue';
import type {
  LandJsonld,
  LandMemberInvitationJsonld,
  LandRoleJsonld,
} from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { useEventBus } from '@vueuse/core';
import {
  landMemberInvitationDeleteSucceededEvent,
  landMemberInvitationPatchSucceededEvent,
} from '@lychen/tera-util-events/LandMemberInvitationEvents';
import { ref } from 'vue';
import FormTeraLandMemberInvitationUpdate from '../../forms/FormTeraLandMemberInvitationUpdate.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { landMemberInvitation } = defineProps<{
  landMemberInvitation: Omit<LandMemberInvitationJsonld, 'landRoles'> & {
    landRoles: LandRoleJsonld[];
  };
  land: LandJsonld;
}>();

const open = ref(false);

const { on } = useEventBus(landMemberInvitationPatchSucceededEvent);
const { on: onDelete } = useEventBus(landMemberInvitationDeleteSucceededEvent);

on(() => {
  open.value = false;
});
onDelete(() => {
  open.value = false;
});
</script>
