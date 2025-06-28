<template>
  <div class="flex flex-col gap-1">
    <slot name="header">
      <template v-if="label">
        <LayoutInAppSideNavigationSectionLabel :label />
      </template>
    </slot>
    <slot />
  </div>
</template>

<script lang="ts" setup>
import { type NavigationSection } from '.';
import LayoutInAppSideNavigationSectionLabel from './LayoutInAppSideNavigationSectionLabel.vue';

defineProps<NavigationSection>();
</script>
