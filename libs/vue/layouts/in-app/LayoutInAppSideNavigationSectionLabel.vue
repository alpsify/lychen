<template>
  <span
    v-if="navigationExpanded"
    class="font-bold opacity-50 text-xs uppercase"
    >{{ label }}</span
  >
  <hr
    v-else
    class="opacity-20 mb-2"
  />
</template>

<script lang="ts" setup>
import { inject } from 'vue';
import { INJECTION_KEY_NAVIGATION_EXPANDED, type NavigationSection } from '.';

defineProps<Pick<NavigationSection, 'label'>>();

const navigationExpanded = inject(INJECTION_KEY_NAVIGATION_EXPANDED);
</script>
