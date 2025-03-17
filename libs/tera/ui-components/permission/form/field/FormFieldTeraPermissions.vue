<template>
  <FormField
    v-slot="{ componentField }"
    :validate-on-blur="!isFieldDirty"
    name="permissions"
    :rules="fieldSchema"
  >
    <FormItem class="flex flex-col">
      <FormLabel>{{ tLandRole('property.permissions.label') }}</FormLabel>
      <Combobox by="label">
        <FormControl>
          <ComboboxAnchor>
            <TagsInput
              :model-value="componentField.modelValue"
              class="px-2 gap-2 w-80"
              @update:model-value="componentField['onUpdate:modelValue']"
            >
              <div class="flex gap-2 flex-wrap items-center">
                <TagsInputItem
                  v-for="item in componentField.modelValue"
                  :key="item"
                  :value="item"
                >
                  <TagsInputItemText class="px-2">
                    {{ t(item) }}
                  </TagsInputItemText>
                  <TagsInputItemDelete />
                </TagsInputItem>
              </div>

              <ComboboxInput
                v-model="searchTerm"
                as-child
              >
                <TagsInputInput
                  placeholder="Permissions..."
                  class="min-w-[200px] w-full p-0 border-none focus-visible:ring-0 h-auto"
                  @keydown.enter.prevent
                />
              </ComboboxInput>
              <Button
                :icon="faShieldCheck"
                size="xs"
                @click="addAllOptions()"
              />
            </TagsInput>
          </ComboboxAnchor>
        </FormControl>

        <ComboboxList>
          <ComboboxEmpty> Nothing found. </ComboboxEmpty>

          <ComboboxGroup>
            <ComboboxItem
              v-for="permission in filteredPermissions"
              :key="permission.value"
              :value="permission.value"
              @select.prevent="
                (ev) => {
                  if (typeof ev.detail.value === 'string') {
                    searchTerm = '';
                    if (!componentField.modelValue.includes(ev.detail.value)) {
                      componentField.modelValue.push(ev.detail.value);
                    }
                  }
                  if (filteredPermissions.length === 0) {
                    open = false;
                  }
                }
              "
            >
              {{ permission.label }}

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

      <FormDescription> Select permissions for this role. </FormDescription>
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
import { Icon } from '@lychen/vue-ui-components-core/icon';
import { useFilter } from 'reka-ui';
import { LandRolePostPermissionsEnum } from '@lychen/tera-util-api-sdk/generated/data-contracts';

import { toTypedSchema } from '@vee-validate/zod';
import { computed, ref, onMounted } from 'vue';
import * as z from 'zod';
import {
  TagsInputItem,
  TagsInputItemDelete,
  TagsInput,
  TagsInputInput,
} from '@lychen/vue-ui-components-core/tags-input';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/permission';
import {
  messages as landRoleMessages,
  TRANSLATION_KEY as LAND_ROLE_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land-role';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { faShieldCheck } from '@fortawesome/pro-light-svg-icons/faShieldCheck';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
const { t: tLandRole } = useI18nExtended({
  messages: landRoleMessages,
  rootKey: LAND_ROLE_TRANSLATION_KEY,
  prefixed: true,
});
const allPermissions = Object.values(LandRolePostPermissionsEnum);

const permissionOptions = ref<{ label: string; value: string }[]>([]); // Initialize as an empty array

onMounted(async () => {
  permissionOptions.value = await Promise.all(
    allPermissions.map(async (permission) => ({
      value: permission,
      label: await t(permission), // Await the translation
    })),
  );
});

const fieldSchema = toTypedSchema(
  z
    .array(z.nativeEnum(LandRolePostPermissionsEnum), {
      required_error: 'Please select at least one permission.',
    })
    .min(1),
);

defineProps({
  isFieldDirty: {
    type: Boolean,
    required: true,
  },
});

const open = ref(false);
const searchTerm = ref('');

const { contains } = useFilter({ sensitivity: 'base' });
const filteredPermissions = computed(() => {
  return searchTerm.value
    ? permissionOptions.value.filter((option) => contains(option.label, searchTerm.value))
    : permissionOptions.value;
});

function addAllOptions() {}
</script>
