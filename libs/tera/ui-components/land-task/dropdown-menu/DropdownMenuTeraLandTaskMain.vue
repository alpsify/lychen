<template>
  <DropdownMenu>
    <DropdownMenuTrigger as-child><slot /></DropdownMenuTrigger>
    <DropdownMenuContent class="w-56">
      <DropdownMenuGroup>
        <DropdownMenuItem :icon="faHashtag">
          <span>Copier l'ID</span>
        </DropdownMenuItem>
        <DropdownMenuItem :icon="faLink">
          <span>Copier le lien</span>
        </DropdownMenuItem>
      </DropdownMenuGroup>
      <DropdownMenuSeparator />
      <DropdownMenuGroup>
        <DropdownMenuItem :icon="faCopy">
          <span>Dupliquer</span>
        </DropdownMenuItem>
      </DropdownMenuGroup>
      <DropdownMenuSeparator />
      <DropdownMenuItem
        class="text-negative focus:bg-negative-container focus:text-on-negative-container"
        :icon="faTrash"
        @click="openDeleteDialog = true"
      >
        {{ tLandTask('action.delete.label') }}
      </DropdownMenuItem>
    </DropdownMenuContent>
  </DropdownMenu>
  <DialogTeraLandTaskDelete
    v-model:open="openDeleteDialog"
    :land-task="landTask"
  ></DialogTeraLandTaskDelete>
</template>

<script setup lang="ts">
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuGroup,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuPortal,
  DropdownMenuSeparator,
  DropdownMenuShortcut,
  DropdownMenuSub,
  DropdownMenuSubContent,
  DropdownMenuSubTrigger,
  DropdownMenuTrigger,
} from '@lychen/vue-ui-components-core/dropdown-menu';
import {
  messages as landTaskMessages,
  TRANSLATION_KEY as LAND_TASK_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land-task';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import DialogTeraLandTaskDelete from '../dialogs/delete/DialogTeraLandTaskDelete.vue';
import { faTrash } from '@fortawesome/pro-light-svg-icons/faTrash';
import { faHashtag } from '@fortawesome/pro-light-svg-icons/faHashtag';
import { faLink } from '@fortawesome/pro-light-svg-icons/faLink';
import { faCopy } from '@fortawesome/pro-light-svg-icons/faCopy';
import { ref } from 'vue';

defineProps<{ landTask: components['schemas']['LandTask.jsonld'] }>();

const { t: tLandTask } = useI18nExtended({
  messages: landTaskMessages,
  rootKey: LAND_TASK_TRANSLATION_KEY,
  prefixed: true,
});

const openDeleteDialog = ref(false);
</script>
