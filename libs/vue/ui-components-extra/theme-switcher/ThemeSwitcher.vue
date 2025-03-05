<template>
  <Icon
    class="cursor-pointer"
    :icon="isDark ? 'moon' : 'brightness'"
    @click="toggleDark()"
  />
</template>

<script setup lang="ts">
import { usePreferredColorScheme } from '@lychen/vue-util-composables/usePreferredColorScheme';
import { Icon } from '@lychen/vue-ui-components-core/icon';

const { toggleDark, isDark } = usePreferredColorScheme();
</script>
