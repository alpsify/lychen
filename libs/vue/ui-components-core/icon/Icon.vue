<template>
  <FontAwesomeIcon v-bind="forwarded" />
</template>

<script setup lang="ts">
import { useForwardProps } from 'reka-ui';
import { FontAwesomeIcon, type FontAwesomeIconProps } from '@fortawesome/vue-fontawesome';

const props = defineProps<FontAwesomeIconProps>();
const forwarded = useForwardProps(props);
</script>
