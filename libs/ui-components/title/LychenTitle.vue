<template>
	<Primitive
		:as="calculatedAs"
		:class="cn(titleVariants({ variant }), props.class)"
		><slot></slot
	></Primitive>
</template>

<script lang="ts" setup>
import { AsTag, Primitive, type PrimitiveProps } from 'radix-vue';
import { Component, computed, HTMLAttributes } from 'vue';

import { cn } from '../lib/utils';
import { TitleVariants, titleVariants } from '.';

interface Props extends PrimitiveProps {
	variant?: TitleVariants['variant'];
	class?: HTMLAttributes['class'];
}

const props = withDefaults(defineProps<Props>(), {
	as: undefined,
	variant: undefined,
	class: undefined,
});

const calculatedAs = computed<AsTag | Component>(() => {
	if (props.as) {
		return props.as;
	}

	if (props.variant?.startsWith('h')) {
		return props.variant;
	}

	return 'h1';
});
</script>
