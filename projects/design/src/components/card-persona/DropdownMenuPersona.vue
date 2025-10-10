<template>
  <DropdownMenu>
    <DropdownMenuTrigger as-child><slot /></DropdownMenuTrigger>
    <DropdownMenuContent class="w-56">
      <DropdownMenuGroup>
        <DropdownMenuItem
          v-if="isSupported && personaId"
          @click="copy(personaId)"
        >
          <IconHash />
          <span>Copier l'ID</span>
        </DropdownMenuItem>
      </DropdownMenuGroup>
      <DropdownMenuSeparator />
      <DropdownMenuGroupDownloadHTMLAsImage
        :template-ref="templateRefForDownload"
        :file-name="`lychen-persona-${personaId}`"
      />
    </DropdownMenuContent>
  </DropdownMenu>
</template>

<script setup lang="ts">
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuGroup,
  DropdownMenuItem,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from '@lychen/vue-components-core/dropdown-menu';
import { useClipboard } from '@vueuse/core';
import DropdownMenuGroupDownloadHTMLAsImage from './DropdownMenuGroupDownloadHTMLAsImage.vue';
import IconHash from '@lychen/vue-icons/IconHash.vue';

interface Props {
  templateRefForDownload: string;
  personaId: string;
}

defineProps<Props>();

const { copy, isSupported } = useClipboard();
</script>
