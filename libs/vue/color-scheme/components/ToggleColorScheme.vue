<template>
  <Button
    icon-only
    size="sm"
    variant="ghost"
    @click="toggleDark()"
  >
    <template #icon>
      <IconMoon v-if="isDark" />
      <IconBrightness v-else />
    </template>
  </Button>
</template>

<script setup lang="ts">
import IconMoon from '@lychen/vue-icons/IconMoon.vue';
import { usePreferredColorScheme } from '../composables/usePreferredColorScheme';
import IconBrightness from '@lychen/vue-icons/IconBrightness.vue';
import Button from '@lychen/vue-components-core/button/Button.vue';

const { toggleDark, isDark } = usePreferredColorScheme();
</script>
