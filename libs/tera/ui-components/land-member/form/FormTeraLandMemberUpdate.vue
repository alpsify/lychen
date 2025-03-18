<template>
  <form
    class="flex flex-col gap-6"
    @submit="onSubmit"
  >
    <Button
      :disabled="!meta.valid || isPending || !meta.dirty"
      :loading="isPending"
      size="sm"
      type="submit"
      class="self-end"
      :text="t('action.update.label')"
    />
  </form>
</template>

<script lang="ts" setup>
import { toast } from '@lychen/vue-ui-components-core/toast/use-toast';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-member';

import { useForm } from 'vee-validate';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { useEventBus } from '@vueuse/core';

import type {
  LandMemberJsonld,
  LandMemberPatchPayload,
} from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { landMemberPatchSucceededEvent } from '@lychen/tera-util-events/LandMemberEvents';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { landMember } = defineProps<{ landMember: LandMemberJsonld }>();

const { isFieldDirty, handleSubmit, meta, setFieldValue, values } = useForm<LandMemberPatchPayload>(
  {
    initialValues: {},
  },
);

const { emit } = useEventBus(landMemberPatchSucceededEvent);

const api = useTeraApi('LandMember');

const { mutate, isPending } = useMutation({
  mutationFn: (data: LandMemberPatchPayload) => api.landMemberPatch(landMember.ulid!, data),
  onSuccess: (data: { data: LandMemberJsonld }, variables, context) => {
    toast({
      title: t('action.update.success.message'),
      variant: 'positive',
    });
    emit(data.data);
  },
});

const onSubmit = handleSubmit((values) => {
  mutate(values);
});
</script>
