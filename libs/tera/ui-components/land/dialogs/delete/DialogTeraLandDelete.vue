<template>
  <Dialog>
    <DialogTrigger as-child>
      <slot />
    </DialogTrigger>
    <DialogContentWithAction
      :title="t('title')"
      :description="t('description')"
    >
      <template #content></template>
      <template #action>
        <Button
          variant="negative"
          :disabled="isPending"
          :loading="isPending"
          @click="deleteLand()"
        >
          {{ tLand('action.delete.label') }}
        </Button>
      </template>
    </DialogContentWithAction>
  </Dialog>
</template>

<script lang="ts" setup>
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import {
  messages as landMessages,
  TRANSLATION_KEY as LAND_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land';
import { messages, TRANSLATION_KEY } from './i18n';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useMutation } from '@tanstack/vue-query';
import { toast } from '@lychen/vue-ui-components-core/toast/use-toast';
import { useEventBus } from '@vueuse/core';
import { landDeleteSucceededEvent } from '@lychen/tera-util-events/LandEvents';
import DialogContentWithAction from '@lychen/vue-ui-components-app/dialogs/DialogContentWithAction.vue';
import { Dialog, DialogTrigger } from '@lychen/vue-ui-components-core/dialog';
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';

const { t: tLand } = useI18nExtended({
  messages: landMessages,
  rootKey: LAND_TRANSLATION_KEY,
  prefixed: true,
});

const { t: t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});

const { emit } = useEventBus(landDeleteSucceededEvent);

const { land } = defineProps<{ land: components['schemas']['Land.jsonld'] }>();

const { api } = useTeraApi();

const { mutate: deleteLand, isPending } = useMutation({
  mutationFn: () => {
    if (!land.ulid) {
      throw new Error('error.missing_ulid');
    }
    return api.DELETE('/api/lands/{ulid}', { params: { path: { ulid: land.ulid } } });
  },
  onSuccess: (data, variables, context) => {
    toast({
      title: tLand('action.delete.success.message'),
      variant: 'positive',
    });
    emit(land);
  },
  onError: (error, variables, context) => {
    toast({
      title: tLand('action.delete.error.message'),
      description: error.message,
      variant: 'negative',
    });
  },
});
</script>
