<template>
  <form
    class="flex flex-col gap-6"
    @submit="onSubmit"
  >
    <FormField
      v-slot="{ componentField }"
      name="name"
      :validate-on-blur="!isFieldDirty"
    >
      <FormItem>
        <FormLabel>Nom de l'espace</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="shadcn"
            v-bind="componentField"
          />
        </FormControl>
        <FormDescription> This is your public display name. </FormDescription>
        <FormMessage />
      </FormItem>
    </FormField>
    <FormField
      v-slot="{ componentField }"
      type="radio"
      name="kind"
    >
      <FormItem class="flex flex-col gap-2 items-stretch">
        <FormLabel>Type d'espace</FormLabel>
        <FormControl>
          <ToggleGroup
            class="grid grid-cols-3 gap-4"
            v-bind="componentField"
            type="single"
            ><FormItem
              v-for="value in Object.values(LandAreaKindEnum)"
              :key="value"
            >
              <FormControl>
                <ToggleGroupItem
                  :value="value"
                  class="p-4 w-full cursor-pointer"
                  variant="outline"
                >
                  {{ t(`property.kind.${value}.default`) }}
                </ToggleGroupItem>
              </FormControl>
            </FormItem>
          </ToggleGroup>
        </FormControl>
      </FormItem>
    </FormField>
    <Button
      :disabled="!meta.valid"
      type="submit"
      :icon="faPlus"
      class="self-end"
      text="Créer l'espace de culture"
    />
  </form>
</template>

<script lang="ts" setup>
import {
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from '@lychen/vue-ui-components-core/form';
import { Input } from '@lychen/vue-ui-components-core/input';
import { toast } from '@lychen/vue-ui-components-core/toast/use-toast';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { faPlus } from '@fortawesome/pro-light-svg-icons/faPlus';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land';

import { useForm } from 'vee-validate';
import { toTypedSchema } from '@vee-validate/zod';
import * as z from 'zod';
import {
  LandAreaKindEnum,
  type LandAreaPostPayload,
} from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { ToggleGroup, ToggleGroupItem } from '@lychen/vue-ui-components-core/toggle-group';

import { useMutation } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const formSchema = toTypedSchema(
  z.object({
    name: z.string().min(2).max(40),
    kind: z.nativeEnum(LandAreaKindEnum).default(LandAreaKindEnum.OpenSoil),
    surface: z.number().min(1),
  }),
);

const { isFieldDirty, handleSubmit, meta } = useForm({
  validationSchema: formSchema,
});

const landApi = useTeraApi('LandArea');

const { mutate } = useMutation({
  mutationFn: (newLandArea: LandAreaPostPayload) => landApi.landAreaPost(newLandArea),
  onSuccess: (data, variables, context) => {
    toast({
      title: 'Espace de culture créé',
      variant: 'positive',
    });
  },
  onError: (error, variables, context) => {},
  onSettled: (data, error, variables, context) => {},
});

const onSubmit = handleSubmit((values) => {
  mutate(values);
});
</script>
