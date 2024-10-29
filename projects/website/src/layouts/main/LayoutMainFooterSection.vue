<template>
	<div class="flex flex-col gap-2">
		<h4 class="text-md font-bold">{{ title }}</h4>
		<slot />
	</div>
</template>

<script setup lang="ts">
defineProps<{ title: string }>();
</script>
