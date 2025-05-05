<template>
  <Card> {{}} </Card>
</template>

<script setup lang="ts">
import Card from '@lychen/vue-ui-components-core/card/Card.vue';

interface Props {
  id: string;
  fullName: string;
  photo: string;
  goals: string[];
  painPoints: string[];
  values: string[];
  age: number;
  location: string;
}

defineProps<Props>();
</script>
