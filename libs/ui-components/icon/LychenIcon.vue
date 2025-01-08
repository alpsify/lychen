<template>
  <FontAwesomeIcon
    v-bind="forwarded"
    :icon="fontAwesomeFormatted"
  />
</template>

<script setup lang="ts">
import { useForwardProps } from 'radix-vue';
import { FontAwesomeIcon, type FontAwesomeIconProps } from '@fortawesome/vue-fontawesome';

import { computed } from 'vue';

import { LYCHEN_ICON_FASHION_DEFAULT, type LychenIconFashion } from '.';

const props = withDefaults(
  defineProps<Omit<FontAwesomeIconProps, 'icon'> & { icon: string; fashion?: LychenIconFashion }>(),
  {
    fashion: LYCHEN_ICON_FASHION_DEFAULT,
  },
);

const forwarded = useForwardProps(props);

const fontAwesomeFormatted = computed(() => [props.fashion, props.icon]);
</script>
