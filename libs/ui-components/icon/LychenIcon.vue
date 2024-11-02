<template>
  <FontAwesomeIcon :icon="fontAwesomeFormatted" />
</template>

<script setup lang="ts">
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

import { computed } from 'vue';

import { LYCHEN_ICON_FASHION, LychenIconFashion } from '.';

const props = withDefaults(defineProps<{ icon: string; fashion?: LychenIconFashion }>(), {
  fashion: LYCHEN_ICON_FASHION.Default,
});

const fontAwesomeFormatted = computed(() => [props.fashion, props.icon]);
</script>
