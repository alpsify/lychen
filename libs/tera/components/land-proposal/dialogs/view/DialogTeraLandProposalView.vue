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
          <DialogTitle>{{ title }}</DialogTitle>
        </div>
        <div class="flex flex-row gap-2">
          <Button
            :icon="faShare"
            label="Partager"
            variant="ghost"
            size="sm"
          />
          <DialogClose />
        </div>
      </DialogHeader>
      <DialogDescription>
        {{ description }}
      </DialogDescription>
      <div class="flex flex-col gap-2">
        Conditions de partage
        <TeraLandProposalSharingConditions
          :sharing-conditions="sharingConditions"
          icons-border-class="border-surface-container-high/90 border-3"
          :display="DISPLAY.Vertical"
          display-label
        />
      </div>
      <div class="flex flex-row gap-4 justify-end">
        <Button label="Candidater" />
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
} from '@lychen/vue-components-core/dialog';
import DialogDescription from '@lychen/vue-components-core/dialog/DialogDescription.vue';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import DialogClose from '@lychen/vue-components-core/dialog/DialogClose.vue';
import { ref } from 'vue';
import Button from '@lychen/vue-components-core/button/Button.vue';
import { faShare } from '@fortawesome/pro-light-svg-icons/faShare';
import TeraLandProposalSharingConditions from '../../../common/sharing-conditions-icons/TeraLandProposalSharingConditions.vue';
import { DISPLAY } from '../../../common/sharing-conditions-icons';
import type { LandSharingCondition } from '@lychen/tera-api-sdk/constants/LandSharingCondition';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

defineProps<{
  title?: string;
  description?: unknown[] | null;
  preferredInteractionMode?: string;
  sharingConditions?: LandSharingCondition[];
  expirationDate?: string;
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
