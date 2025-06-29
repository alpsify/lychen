<template>
  <Dialog>
    <DialogTrigger as-child>
      <slot />
    </DialogTrigger>

    <DialogContent class="md:max-w-[30%] w-full max-h-dvh overflow-y-auto gap-8">
      <DialogHeader class="flex flex-row justify-between items-start gap-10">
        <div class="md:w-4/5 flex flex-col gap-2">
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
  </Dialog>
</template>

<script lang="ts" setup>
import {
  Dialog,
  DialogTrigger,
  DialogContent,
  DialogHeader,
  DialogTitle,
} from '@lychen/vue-components-core/dialog';
import DialogDescription from '@lychen/vue-components-core/dialog/DialogDescription.vue';
import FormTeraLandCreate from '@lychen/tera-components/land/forms/FormTeraLandCreate.vue';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import DialogClose from '@lychen/vue-components-core/dialog/DialogClose.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
