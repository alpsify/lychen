<template>
  <Dialog>
    <DialogTrigger as-child>
      <slot />
    </DialogTrigger>
    <DialogContentWithAction
      :title="t(`title`)"
      :description="t(`description`)"
    >
      <template #content></template>
      <template #action>
        <Button
          variant="negative"
          :disabled="isPending"
          :loading="isPending"
          @click="deleteLandTask()"
        >
          {{ tLandTask(`action.delete.label`) }}
        </Button>
      </template>
    </DialogContentWithAction>
  </Dialog>
</template>

<script lang="ts" setup>
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { Dialog, DialogTrigger } from '@lychen/vue-ui-components-core/dialog';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import {
  messages as landTaskMessages,
  TRANSLATION_KEY as LAND_TASK_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land-task';
import { messages, TRANSLATION_KEY } from './i18n';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useMutation } from '@tanstack/vue-query';
import { toast } from '@lychen/vue-ui-components-core/toast/use-toast';
import { useEventBus } from '@vueuse/core';
import { landTaskDeleteSucceededEvent } from '@lychen/tera-util-events/LandTaskEvents';
import DialogContentWithAction from '@lychen/vue-ui-components-app/dialogs/DialogContentWithAction.vue';
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';

const { t: tLandTask } = useI18nExtended({
  messages: landTaskMessages,
  rootKey: LAND_TASK_TRANSLATION_KEY,
  prefixed: true,
});

const { t: t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});

const { emit } = useEventBus(landTaskDeleteSucceededEvent);

const { landTask } = defineProps<{
  landTask: components['schemas']['LandTask.jsonld'];
}>();

const { api } = useTeraApi();

const { mutate: deleteLandTask, isPending } = useMutation({
  mutationFn: () => {
    if (!landTask.ulid) {
      throw new Error('missing.ulid');
    }
    return api.DELETE('/api/land_tasks/{ulid}', {
      params: { path: { ulid: landTask.ulid } },
    });
  },
  onSuccess: (data, variables, context) => {
    toast({
      title: tLandTask('action.delete.success.message'),
      variant: 'positive',
    });

    emit(landTask);
  },
  onError: (error, variables, context) => {
    toast({
      title: tLandTask('action.delete.error.message'),
      description: error.message,
      variant: 'negative',
    });
  },
});
</script>
