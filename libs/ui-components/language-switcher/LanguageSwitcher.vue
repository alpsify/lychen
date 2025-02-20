<script lang="ts" setup>
import { useI18n } from 'vue-i18n';
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuRadioGroup,
  DropdownMenuRadioItem,
  DropdownMenuTrigger,
} from '../dropdown-menu';
import LychenIcon from '../icon/LychenIcon.vue';

const { locale } = useI18n();
</script>

<template>
  <DropdownMenu>
    <DropdownMenuTrigger as-child>
      <LychenIcon
        icon="language"
        class="cursor-pointer"
      />
    </DropdownMenuTrigger>
    <DropdownMenuContent class="w-auto">
      <DropdownMenuRadioGroup v-model="locale">
        <DropdownMenuRadioItem
          value="fr-FR"
          class="cursor-pointer"
        >
          Français
        </DropdownMenuRadioItem>
        <DropdownMenuRadioItem
          value="en-US"
          class="cursor-pointer"
        >
          English
        </DropdownMenuRadioItem>
      </DropdownMenuRadioGroup>
    </DropdownMenuContent>
  </DropdownMenu>
</template>
