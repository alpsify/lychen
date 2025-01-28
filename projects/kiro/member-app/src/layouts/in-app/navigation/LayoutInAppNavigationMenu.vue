<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { RouterLink } from 'vue-router';

import { LayoutInAppNavigationMenu } from '.';

const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

interface Props {
  menu: LayoutInAppNavigationMenu;
}

const props = defineProps<Props>();
</script>

<template>
  <RouterLink
    :to="{ name: props.menu.routeName }"
    class="flex flex-col gap-1 rounded-md p-2 text-on-surface-container-low hover:bg-surface-container-lowest"
  >
    <LychenIcon :icon="props.menu.icon" />
    <small class="opacity-50">{{ props.menu.title }}</small>
  </RouterLink>
</template>
