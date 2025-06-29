<script lang="ts" setup>
import type { LabelProps } from 'reka-ui';
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { Label } from '../label';
import { useFormField } from './useFormField';

const props = defineProps<LabelProps & { class?: HTMLAttributes['class'] }>();

const { error, formItemId } = useFormField();
</script>

<template>
  <Label
    :class="cn(error && 'text-negative', props.class)"
    :for="formItemId"
  >
    <slot />
  </Label>
</template>
