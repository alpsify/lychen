<template>
  <div
    :data-pw="association.uuid"
    class="bg-surface-container text-on-surface-container rounded-xl p-4"
  >
    <h3 class="font-bold">
      {{ association.name }}
      {{ association.description }}
    </h3>
    <div class="flex gap-4">
      <span>4 <LychenIcon icon="user" /></span>
    </div>
  </div>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';

import { Props } from '.';

defineProps<Props>();

const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));
</script>
