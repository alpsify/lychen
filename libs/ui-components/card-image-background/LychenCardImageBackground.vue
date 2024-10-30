<template>
	<div
		:key="title"
		:class="
			cn(
				'group relative col-span-3 flex flex-col justify-end overflow-hidden rounded-xl bg-surface-container-low',
				// light styles
				'[box-shadow:0_0_0_1px_rgba(0,0,0,.03),0_2px_4px_rgba(0,0,0,.05),0_12px_24px_rgba(0,0,0,.05)]',
				// dark styles
				'transform-gpu  dark:[border:1px_solid_rgba(255,255,255,.1)] dark:[box-shadow:0_-20px_80px_-20px_#ffffff1f_inset]',
				props.class,
			)
		">
		<slot name="background">
			<div
				v-if="image"
				class="absolute top-0 right-0 size-full opacity-100 bg-center group-hover:opacity-30 transition duration-150 ease-in-out"
				:style="`background-image: url('${image}')`"></div>
		</slot>

		<div
			class="m-2 rounded-lg pointer-events-none flex transform-gpu flex-col gap-1 p-6 transition-all duration-300 group-hover:-translate-y-10 backdrop-blur-md bg-surface/30 group-hover:bg-transparent group-hover:backdrop-blur-none">
			<h3 class="text-xl font-semibold text-surface-container-on/80">
				{{ title }}
			</h3>
			<p class="max-w-lg text-surface-container-on/60">{{ description }}</p>
		</div>

		<div
			class="pointer-events-none absolute inset-0 transform-gpu transition-all duration-300 group-hover:bg-black/[.03] group-hover:dark:bg-neutral-800/10" />
	</div>
</template>

<script lang="ts" setup>
import LychenButton from '../button/LychenButton.vue';
import LychenIcon from '../icon/LychenIcon.vue';
import { cn } from '../lib/utils';

const props = defineProps<{
	title: string;
	class: string;
	icon?: string;
	description: string;
	routeName: string;
	cta: string;
	image: string;
}>();
</script>
