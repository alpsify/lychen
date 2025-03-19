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
          variant="positive"
          :disabled="isPending"
          :loading="isPending"
          @click="deleteLandRole()"
        >
          {{ tLandRole('action.delete.label') }}
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
  messages as landRoleMessages,
  TRANSLATION_KEY as LAND_ROLE_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land-role';
import { messages, TRANSLATION_KEY } from './i18n';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useMutation } from '@tanstack/vue-query';
import { toast } from '@lychen/vue-ui-components-core/toast/use-toast';
import { useEventBus } from '@vueuse/core';
import { landRoleDeleteSucceededEvent } from '@lychen/tera-util-events/LandRoleEvents';
import type { LandRoleJsonld } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import DialogContentWithAction from '@lychen/vue-ui-components-app/dialogs/DialogContentWithAction.vue';

const { t: tLandRole } = useI18nExtended({
  messages: landRoleMessages,
  rootKey: LAND_ROLE_TRANSLATION_KEY,
  prefixed: true,
});

const { t: t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});

const { emit } = useEventBus(landRoleDeleteSucceededEvent);

const { landRole } = defineProps<{ landRole: LandRoleJsonld }>();

const api = useTeraApi('LandRole');

const { mutate: deleteLandRole, isPending } = useMutation({
  mutationFn: () => api.landRoleDelete(landRole.ulid!),
  onSuccess: (data, variables, context) => {
    toast({
      title: tLandRole('action.delete.success.message'),
      variant: 'positive',
    });
    emit(landRole);
  },
  onError: (error, variables, context) => {
    toast({
      title: tLandRole('action.delete.error.message'),
      description: error.message,
      variant: 'negative',
    });
  },
});
</script>
