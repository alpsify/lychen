<script setup lang="ts">
import type { HTMLAttributes } from "vue";

import { cn } from "../lib/utils";
import { badgeVariants, type LychenBadgeVariants } from ".";

const props = defineProps<{
  variant?: LychenBadgeVariants["variant"];
  class?: HTMLAttributes["class"];
}>();
</script>

<template>
  <div :class="cn(badgeVariants({ variant }), props.class)">
    <slot />
  </div>
</template>
