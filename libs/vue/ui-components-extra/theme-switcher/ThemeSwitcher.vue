<template>
  <Icon
    class="cursor-pointer"
    :icon="isDark ? faMoon : faBrightness"
    @click="toggleDark()"
  />
</template>

<script setup lang="ts">
import { usePreferredColorScheme } from '@lychen/vue-util-composables/usePreferredColorScheme';
import { Icon } from '@lychen/vue-ui-components-core/icon';
import { faMoon } from '@fortawesome/pro-light-svg-icons/faMoon';
import { faBrightness } from '@fortawesome/pro-light-svg-icons/faBrightness';

const { toggleDark, isDark } = usePreferredColorScheme();
</script>
