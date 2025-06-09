<template>
  <DropdownMenuGroup>
    <DropdownMenuItem
      :icon="faFilePng"
      @click="download(SUPPORTED_EXTENSION.Png)"
    >
      <span>Télécharger en PNG</span>
    </DropdownMenuItem>
    <DropdownMenuItem
      :icon="faFileSvg"
      @click="download(SUPPORTED_EXTENSION.Svg)"
    >
      <span>Télécharger en SVG</span>
    </DropdownMenuItem>
  </DropdownMenuGroup>
</template>

<script setup lang="ts">
import { SUPPORTED_EXTENSION, useDownloadHTMLAsImage } from './useDownloadHTMLAsImage';
import { DropdownMenuGroup, DropdownMenuItem } from '@lychen/vue-components-core/dropdown-menu';
import { faFileSvg } from '@fortawesome/pro-light-svg-icons/faFileSvg';
import { faFilePng } from '@fortawesome/pro-light-svg-icons/faFilePng';

interface Props {
  templateRef: string;
  fileName: string;
}

const { templateRef, fileName } = defineProps<Props>();

const { download } = useDownloadHTMLAsImage(templateRef, fileName);
</script>
