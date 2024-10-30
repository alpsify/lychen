<template>
	<Primitive
		:as="as"
		:class="cn(paragraphVariants({ variant }), props.class)"
		><slot></slot
	></Primitive>
</template>

<script lang="ts" setup>
import { Primitive, type PrimitiveProps } from 'radix-vue';
import { HTMLAttributes } from 'vue';

import { cn } from '../lib/utils';
import { ParagraphVariants, paragraphVariants } from '.';

interface Props extends PrimitiveProps {
	variant?: ParagraphVariants['variant'];
	class?: HTMLAttributes['class'];
}

const props = withDefaults(defineProps<Props>(), {
	as: 'p',
	variant: undefined,
	class: undefined,
});
</script>
