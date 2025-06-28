<template>
  <Popover>
    <Tooltip>
      <TooltipTrigger>
        <PopoverTrigger as-child>
          <Button
            icon-only
            size="sm"
            variant="ghost"
            :icon-position="ICON_POSITION.Start"
          >
            <template #icon>
              <IconGrid />
            </template>
          </Button>
        </PopoverTrigger>
      </TooltipTrigger>
      <PopoverContent class="flex flex-col gap-4">
        <h2 class="p-2 self-center font-medium">Lychen écosystème</h2>
        <div class="grid grid-cols-3 gap-4 place-items-center">
          <AppMenuIcon
            v-for="app in filteredApps"
            :key="app.id"
            v-bind="app"
          />
        </div>
        <hr class="w-2/3 self-center opacity-30" />
        <p class="text-sm self-center opacity-70">
          Découvrir toutes les applications <IconArrowUpRight />
        </p>
      </PopoverContent>
      <TooltipContent> Applications </TooltipContent>
    </Tooltip>
  </Popover>
</template>

<script lang="ts" setup>
import { ICON_POSITION } from '@lychen/vue-components-core/button';
import Button from '@lychen/vue-components-core/button/Button.vue';
import { Popover, PopoverContent, PopoverTrigger } from '@lychen/vue-components-core/popover';
import { Tooltip, TooltipContent, TooltipTrigger } from '@lychen/vue-components-core/tooltip';
import IconGrid from '@lychen/vue-icons/IconGrid.vue';
import AppMenuIcon from './AppMenuIcon.vue';
import IconArrowUpRight from '@lychen/vue-icons/IconArrowUpRight.vue';
import { computed } from 'vue';

const apps = [
  {
    id: 'tera-app',
    name: 'tera',
    link: '',
  },
];

apps.sort((a, b) => {
  const nameA = a.name.toLowerCase();
  const nameB = b.name.toLowerCase();
  if (nameA < nameB) return -1;
  if (nameA > nameB) return 1;
  return 0;
});

const currentAppId = import.meta.env.VITE_APP_ID;
const filteredApps = computed(() => {
  if (!currentAppId) {
    return apps;
  }
  return apps.filter((app) => app.id !== currentAppId);
});
</script>
