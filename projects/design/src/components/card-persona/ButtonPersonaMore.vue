<template>
  <DropdownMenuPersona
    :template-ref-for-download
    :persona-id="personaId"
  >
    <Button
      :icon="faEllipsisV"
      size="xs"
      variant="ghost"
      :class="cn(EXCLUDED_CLASS, props.class)"
    />
  </DropdownMenuPersona>
</template>

<script setup lang="ts">
import Button from '@lychen/vue-components-core/button/Button.vue';
import { EXCLUDED_CLASS } from './useDownloadHTMLAsImage';
import { faEllipsisV } from '@fortawesome/pro-light-svg-icons/faEllipsisV';
import DropdownMenuPersona from './DropdownMenuPersona.vue';
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';

interface Props {
  personaId: string;
  templateRefForDownload: string;
  class?: HTMLAttributes['class'];
}

const props = defineProps<Props>();
</script>
