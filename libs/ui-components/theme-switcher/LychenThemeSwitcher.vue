<template>
  <LychenIcon
    class="cursor-pointer"
    :icon="isDark ? 'moon' : 'brightness'"
    @click="toggleDark()"
  />
</template>

<script setup lang="ts">
import { usePrefersColorScheme } from '@lychen/vue-util-composables/usePrefersColorScheme';
import { defineAsyncComponent } from 'vue';

const LychenIcon = defineAsyncComponent(() => import('../icon/LychenIcon.vue'));

const { toggleDark, isDark } = usePrefersColorScheme();
</script>
