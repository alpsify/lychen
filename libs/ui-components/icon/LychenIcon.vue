<template>
  <FontAwesomeIcon :icon="fontAwesomeFormatted" />
</template>

<script setup lang="ts">
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { computed } from "vue";

import { LYCHEN_ICON_STYLE, LychenIconStyle } from ".";

const props = withDefaults(defineProps<{ icon: string; style?: LychenIconStyle }>(), {
  style: LYCHEN_ICON_STYLE.Default,
});

const fontAwesomeFormatted = computed(() => [props.style, props.icon]);
</script>
