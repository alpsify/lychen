<script setup lang="ts">
import { faSpinnerThird } from '@fortawesome/pro-light-svg-icons/faSpinnerThird';
import Icon from './Icon.vue';
</script>

<template>
  <Icon
    :icon="faSpinnerThird"
    class="fa-spin transition-opacity"
  />
</template>
