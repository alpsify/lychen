<template>
  <FormField
    v-slot="{ componentField }"
    v-model="model"
    :validate-on-blur="!isFieldDirty"
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
              :model-value="componentField.modelValue"
              class="px-2 gap-2"
              @update:model-value="componentField['onUpdate:modelValue']"
            >
              <div class="flex gap-2 flex-wrap items-center">
                <TagsInputItem
                  v-for="item in componentField.modelValue"
                  :key="item['@id']"
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
              :key="landRole.value['@id']"
              :value="landRole.value"
              @select.prevent="handleSelect(landRole.value)"
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
import { computed, ref, onMounted } from 'vue';
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
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';

const { t } = useI18nExtended({
  messages: landRoleMessages,
  rootKey: LAND_ROLE_TRANSLATION_KEY,
  prefixed: true,
});

const props = defineProps<{
  land: components['schemas']['Land.jsonld'];
  isFieldDirty: boolean;
  initialValues?: components['schemas']['LandRole.jsonld'][];
}>();

const model = defineModel<components['schemas']['LandRole.jsonld'][]>({ default: [] });

const fieldSchema = toTypedSchema(
  z.array(z.object({ '@id': z.string() })).min(1, {
    message: 'Please select at least one land role.',
  }),
);

const landId = computed(() => props.land['@id']);

const { api } = useTeraApi();

const { data: landRoles } = useQuery({
  queryKey: ['landRoles', landId],
  queryFn: async () => {
    if (!landId.value) {
      throw new Error('missing.land_id');
    }
    const response = await api.GET('/api/land_roles', {
      params: {
        query: {
          land: landId.value,
        },
      },
    });
    return response.data;
  },
  enabled: !!landId.value,
});

const landRoleOptions = computed(() =>
  (landRoles.value?.member || []).map((landRole) => ({
    label: landRole.name,
    value: landRole,
  })),
);
const searchTerm = ref('');
const open = ref(false);
const { contains } = useFilter({ sensitivity: 'base' });

const filteredOptions = computed(() => {
  if (!landRoleOptions.value) {
    return [];
  }

  const options = landRoleOptions.value.filter(
    (i) => !model.value.some((m) => m['@id'] === i.value['@id']),
  );
  return searchTerm.value
    ? options.filter((option) => contains(option.label, searchTerm.value))
    : options;
});

function handleSelect(value: components['schemas']['LandRole.jsonld']) {
  searchTerm.value = '';

  model.value.push(value);
  model.value = [...new Set(model.value)];

  if (filteredOptions.value.length === 0) {
    open.value = false;
  }
}

onMounted(() => {
  if (props.initialValues) {
    model.value = [...props.initialValues];
  }
});
</script>
