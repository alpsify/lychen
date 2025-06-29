<script lang="ts" setup>
import { Popover, PopoverContent, PopoverTrigger } from '@lychen/vue-components-core/popover';
import { useI18nExtended } from '../../composables/useI18nExtended';
import IconLanguage from '@lychen/vue-icons/IconLanguage.vue';
import Button from '@lychen/vue-components-core/button/Button.vue';

const { locale } = useI18nExtended();

const availableLocales = [
  { code: 'en-US', name: 'English' },
  { code: 'fr-FR', name: 'Français' },
];
</script>

<template>
  <Popover>
    <PopoverTrigger as-child>
      <Button
        icon-only
        size="sm"
        variant="ghost"
      >
        <template #icon>
          <IconLanguage />
        </template>
      </Button>
    </PopoverTrigger>
    <PopoverContent
      class="w-auto"
      side="top"
      :side-offset="30"
    >
      <div
        v-for="(localeItem, index) in availableLocales"
        :key="index"
        class="p-2 cursor-pointer hover:bg-gray-100"
        @click="locale = localeItem.code"
      >
        {{ localeItem.name }}
      </div>
    </PopoverContent>
  </Popover>
</template>
