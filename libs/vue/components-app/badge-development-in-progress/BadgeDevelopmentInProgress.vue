<template>
  <Badge variant="warning">
    <Icon :icon="faTrowelBricks" />
    En construction
  </Badge>
</template>

<script setup lang="ts">
import { Icon } from '@lychen/vue-components-core/icon';
import { Badge } from '@lychen/vue-components-core/badge';
import { faTrowelBricks } from '@fortawesome/pro-light-svg-icons/faTrowelBricks';
</script>
