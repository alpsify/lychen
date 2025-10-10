<template>
  <DropdownMenuGroup>
    <DropdownMenuItem @click="download(SUPPORTED_EXTENSION.Png)">
      <IconFileImage />
      <span>Télécharger en PNG</span>
    </DropdownMenuItem>
    <DropdownMenuItem @click="download(SUPPORTED_EXTENSION.Svg)">
      <IconFileCode />
      <span>Télécharger en SVG</span>
    </DropdownMenuItem>
  </DropdownMenuGroup>
</template>

<script setup lang="ts">
import { SUPPORTED_EXTENSION, useDownloadHTMLAsImage } from './useDownloadHTMLAsImage';
import { DropdownMenuGroup, DropdownMenuItem } from '@lychen/vue-components-core/dropdown-menu';
import IconFileImage from '@lychen/vue-icons/IconFileImage.vue';
import IconFileCode from '@lychen/vue-icons/IconFileCode.vue';

interface Props {
  templateRef: string;
  fileName: string;
}

const { templateRef, fileName } = defineProps<Props>();

const { download } = useDownloadHTMLAsImage(templateRef, fileName);
</script>
