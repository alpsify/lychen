<template>
  <LychenIcon
    class="cursor-pointer"
    :icon="isDark ? 'moon' : 'brightness'"
    @click="toggleDark()"
  />
</template>

<script setup lang="ts">
import { usePreferredColorScheme } from '@lychen/vue-util-composables/usePreferredColorScheme';
import { defineAsyncComponent } from 'vue';

const LychenIcon = defineAsyncComponent(() => import('../icon/LychenIcon.vue'));

const { toggleDark, isDark } = usePreferredColorScheme();
</script>
