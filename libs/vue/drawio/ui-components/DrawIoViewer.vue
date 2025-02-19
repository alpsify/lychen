<template>
  <div class="component rounded-3xl bg-on-surface-container dark:bg-surface-container p-6">
    <slot>
      <div
        v-if="mxgraph"
        class="mxgraph"
        :data-mxgraph="mxgraph"
      ></div>
    </slot>
  </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue';

defineProps<{ mxgraph?: string }>();
onMounted(() => {
  let drawioScript = document.createElement('script');
  drawioScript.setAttribute('src', 'https://viewer.diagrams.net/js/viewer-static.min.js');
  document.head.appendChild(drawioScript);
});
</script>

<style scoped>
.component {
  max-width: 100%;
}
</style>
