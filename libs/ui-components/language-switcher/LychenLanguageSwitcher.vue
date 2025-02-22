<script lang="ts" setup>
import { useI18n } from 'vue-i18n';
import {
  LychenDropdownMenu,
  LychenDropdownMenuContent,
  LychenDropdownMenuRadioGroup,
  LychenDropdownMenuRadioItem,
  LychenDropdownMenuTrigger,
} from '../dropdown-menu';
import LychenIcon from '../icon/LychenIcon.vue';

const { locale } = useI18n();
</script>

<template>
  <LychenDropdownMenu>
    <LychenDropdownMenuTrigger as-child>
      <LychenIcon
        icon="language"
        class="cursor-pointer"
      />
    </LychenDropdownMenuTrigger>
    <LychenDropdownMenuContent class="w-auto">
      <LychenDropdownMenuRadioGroup v-model="locale">
        <LychenDropdownMenuRadioItem
          value="fr-FR"
          class="cursor-pointer"
        >
          Français
        </LychenDropdownMenuRadioItem>
        <LychenDropdownMenuRadioItem
          value="en-US"
          class="cursor-pointer"
        >
          English
        </LychenDropdownMenuRadioItem>
      </LychenDropdownMenuRadioGroup>
    </LychenDropdownMenuContent>
  </LychenDropdownMenu>
</template>
