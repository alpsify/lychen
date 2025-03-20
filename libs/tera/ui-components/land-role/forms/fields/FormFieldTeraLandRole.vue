<template>
  <FormField
    name="landRoles"
    :rules="fieldSchema"
  >
    <FormItem class="flex flex-col">
      <FormLabel>Rôles</FormLabel>
      <Combobox
        v-model:open="open"
        by="label"
      >
        <FormControl class="w-full">
          <ComboboxAnchor>
            <TagsInput
              v-model="model"
              class="px-2 gap-2"
            >
              <div class="flex gap-2 flex-wrap items-center">
                <TagsInputItem
                  v-for="item in model"
                  :key="item.ulid"
                  :value="item"
                >
                  <TagsInputItemText class="px-2">
                    {{ item.name }}
                  </TagsInputItemText>
                  <TagsInputItemDelete />
                </TagsInputItem>
              </div>

              <ComboboxInput
                v-model="searchTerm"
                as-child
              >
                <TagsInputInput
                  placeholder="Rechercher un rôle..."
                  class="min-w-[200px] w-full p-0 border-none focus-visible:ring-0 h-auto"
                  @keydown.enter.prevent
                />
              </ComboboxInput>
            </TagsInput>
          </ComboboxAnchor>
        </FormControl>

        <ComboboxList>
          <ComboboxEmpty> Aucuns rôle trouvé </ComboboxEmpty>

          <ComboboxGroup>
            <ComboboxItem
              v-for="landRole in filteredOptions"
              :key="landRole.value.ulid"
              :value="landRole.value"
              @select.prevent="handleLandRoleSelect(landRole.value as LandRoleJsonld)"
            >
              {{ landRole.label }}

              <ComboboxItemIndicator>
                <Icon
                  :icon="faCheck"
                  class="ml-auto h-4 w-4"
                />
              </ComboboxItemIndicator>
            </ComboboxItem>
          </ComboboxGroup>
        </ComboboxList>
      </Combobox>

      <FormDescription> Select roles for this user. </FormDescription>
      <FormMessage />
    </FormItem>
  </FormField>
</template>

<script setup lang="ts">
import { faCheck } from '@fortawesome/pro-light-svg-icons/faCheck';
import {
  Combobox,
  ComboboxAnchor,
  ComboboxEmpty,
  ComboboxGroup,
  ComboboxInput,
  ComboboxItem,
  ComboboxItemIndicator,
  ComboboxList,
} from '@lychen/vue-ui-components-core/combobox';

import {
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from '@lychen/vue-ui-components-core/form';
import { useFilter } from 'reka-ui';
import { computed, ref } from 'vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import {
  messages as landRoleMessages,
  TRANSLATION_KEY as LAND_ROLE_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land-role';
import Icon from '@lychen/vue-ui-components-core/icon/Icon.vue';
import { useQuery } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { z } from 'zod';
import { toTypedSchema } from '@vee-validate/zod';
import {
  TagsInputItem,
  TagsInputItemDelete,
  TagsInput,
  TagsInputInput,
} from '@lychen/vue-ui-components-core/tags-input';
import type {
  LandJsonld,
  LandRoleJsonld,
} from '@lychen/tera-util-api-sdk/generated/data-contracts';

const { t } = useI18nExtended({
  messages: landRoleMessages,
  rootKey: LAND_ROLE_TRANSLATION_KEY,
  prefixed: true,
});

const props = defineProps<{
  land: LandJsonld;
}>();

const model = defineModel<LandRoleJsonld[]>({ default: [] });

const fieldSchema = toTypedSchema(
  z.array(z.object({ label: z.string(), value: z.string() })).min(1, {
    message: 'Please select at least one land role.',
  }),
);

const api = useTeraApi('LandRole');
const { data: landRoles } = useQuery({
  queryKey: ['landRoles', props.land],
  queryFn: async () => {
    if (!props.land['@id']) {
      throw new Error('missing.@id');
    }
    const response = await api.landRoleGetCollection({
      land: props.land['@id'],
    });
    return response.data.member;
  },
  enabled: !!props.land['@id'],
});

const landRoleOptions = computed(() => {
  return (landRoles.value || []).map((landRole) => ({
    label: landRole.name,
    value: landRole,
  }));
});

const searchTerm = ref('');
const open = ref(false);
const { contains } = useFilter({ sensitivity: 'base' });

const filteredOptions = computed(() => {
  const options = landRoleOptions.value.filter(
    (i) => !model.value.some((m) => m.ulid === i.value.ulid),
  );
  return searchTerm.value
    ? options.filter((option) => contains(option.label, searchTerm.value))
    : options;
});

function handleLandRoleSelect(value: LandRoleJsonld) {
  searchTerm.value = '';

  model.value.push(value);

  if (filteredOptions.value.length === 0) {
    open.value = false;
  }
}
</script>
