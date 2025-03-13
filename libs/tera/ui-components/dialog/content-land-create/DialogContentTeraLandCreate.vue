<template>
  <DialogContent
    class="bg-surface-container-high/70 backdrop-blur-xl text-on-surface-container md:max-w-[50%] w-full max-h-dvh overflow-y-auto gap-8"
  >
    <DialogHeader class="flex flex-row justify-between items-start gap-10">
      <div class="md:w-2/3">
        <DialogTitle>{{ t('title') }}</DialogTitle>
        <DialogDescription>
          {{ t('description') }}
        </DialogDescription>
        <p class="italic text-sm">{{ t('sub_description') }}</p>
      </div>
      <DialogClose />
    </DialogHeader>
    <FormTeraLandCreate />
  </DialogContent>
</template>

<script lang="ts" setup>
import { DialogContent, DialogHeader, DialogTitle } from '@lychen/vue-ui-components-core/dialog';
import DialogDescription from '@lychen/vue-ui-components-core/dialog/DialogDescription.vue';
import FormTeraLandCreate from '@lychen/tera-ui-components/form/land-create/FormTeraLandCreate.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import DialogClose from '@lychen/vue-ui-components-core/dialog/DialogClose.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
