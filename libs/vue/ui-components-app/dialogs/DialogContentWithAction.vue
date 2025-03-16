<template>
  <DialogContent
    class="bg-surface-container-high/70 backdrop-blur-xl text-on-surface-container md:max-w-[30%] w-full max-h-dvh overflow-y-auto gap-8"
  >
    <DialogHeader>
      <slot name="header">
        <DialogTitle>{{ title }}</DialogTitle>
        <DialogDescription> {{ description }} </DialogDescription>
      </slot>
    </DialogHeader>
    <slot />
    <DialogFooter>
      <slot name="footer">
        <DialogClose
          v-if="hasCancelButton"
          class="flex flex-row justify-end gap-6"
        >
          <Button variant="container-high">{{ t('cancel.label') }}</Button>

          <slot name="action" />
        </DialogClose>
      </slot>
    </DialogFooter>
  </DialogContent>
</template>

<script lang="ts" setup>
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import {
  DialogClose,
  DialogContent,
  DialogHeader,
  DialogFooter,
  DialogTitle,
  DialogDescription,
} from '@lychen/vue-ui-components-core/dialog';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from '@lychen/ui-i18n/action';

const {
  title,
  description,
  hasCancelButton = true,
} = defineProps<{
  title: string;
  description: string;
  hasCancelButton?: boolean;
}>();

const { t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});
</script>
