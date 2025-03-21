<template>
  <form
    class="flex flex-col gap-6"
    @submit.prevent="onSubmit"
  >
    <FormFieldEmail
      :is-field-dirty="isFieldDirty"
      :rules="emailFieldSchema"
    />
    <FormFieldTeraLandRole
      :is-field-dirty="isFieldDirty"
      :land="land"
      @update:model-value="setFieldValue('landRoles', $event)"
    />
    <Button
      :disabled="!meta.valid || isPending"
      :loading="isPending"
      type="submit"
      class="self-end"
      :text="t('action.create.label')"
    />
  </form>
</template>

<script lang="ts" setup>
import { toast } from '@lychen/vue-ui-components-core/toast/use-toast';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import FormFieldEmail from '@lychen/vue-ui-components-app/fields/email/FormFieldEmail.vue';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-member-invitation';

import { useForm } from 'vee-validate';
import {
  type LandJsonld,
  type LandMemberInvitationJsonld,
  type LandRoleJsonld,
} from '@lychen/tera-util-api-sdk/generated/data-contracts';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { useEventBus } from '@vueuse/core';
import { landMemberInvitationPostSucceededEvent } from '@lychen/tera-util-events/LandMemberInvitationEvents';
import FormFieldTeraLandRole from '../../land-role/forms/fields/FormFieldTeraLandRole.vue';
import { extractValuesByKey } from '@lychen/typescript-util-object/Object';
import { z } from 'zod';
import { toTypedSchema } from '@vee-validate/zod';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { land } = defineProps<{ land: LandJsonld }>();

interface FormType {
  landRoles: LandRoleJsonld[];
  email: string;
}

const emailFieldSchema = toTypedSchema(
  z
    .string()
    .email()
    .refine(
      async (email) => {
        if (!land['@id']) {
          throw new Error('missing.land_id');
        }
        if (!email) {
          return true;
        }
        const response = await api.landMemberInvitationCheckEmailUnicity({
          email,
          land: land['@id'],
        });
        return response.data.isUnique;
      },
      {
        message: 'This email is already invited',
      },
    ),
);

const { isFieldDirty, handleSubmit, meta, setFieldValue } = useForm<FormType>({
  initialValues: {
    landRoles: undefined,
  },
});

const { emit } = useEventBus(landMemberInvitationPostSucceededEvent);

const api = useTeraApi('LandMemberInvitation');

const { mutate, isPending } = useMutation({
  mutationFn: (values: FormType) => {
    const landRoleIds = extractValuesByKey(values.landRoles, '@id');
    return api.landMemberInvitationPost({
      email: values.email,
      landRoles: landRoleIds,
      land: land['@id']!,
    });
  },
  onSuccess: (data: { data: LandMemberInvitationJsonld }, variables, context) => {
    toast({
      title: t('action.create.success.message'),
      variant: 'positive',
    });
    emit(data.data);
  },
  onError: (error, variables, context) => {
    toast({
      title: t('action.create.error.message'),
      description: error.message,
      variant: 'negative',
    });
  },
});

const onSubmit = handleSubmit((values) => {
  mutate(values);
});
</script>
