<template>
  <component
    :is="route ? 'RouterLink' : 'a'"
    :to="route ? { name: route.name } : null"
    class="cursor-pointer select-none flex flex-col gap-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-primary-container/30 hover:text-primary-container-on focus:bg-primary-container/30 focus:text-primary-container-on"
    :href="link"
    :target="target"
  >
    <div class="flex flex-row justify-between no-wrap">
      <p class="text-md font-black font-lexend leading-none tracking-wide">
        {{ title }}
      </p>
      <div class="text-xs">
        <LychenIcon
          v-if="link"
          icon="arrow-up-right"
          class="opacity-60"
        />
      </div>
    </div>
    <p class="line-clamp-3 text-xs leading-snug opacity-50">
      {{ description }}
    </p>
  </component>
</template>

<script lang="ts" setup>
import LychenIcon from '../icon/LychenIcon.vue';

interface Props {
  title: string;
  description: string;
  route?: { name: string };
  link?: string;
  target?: string;
}
withDefaults(defineProps<Props>(), {
  target: '_blank',
  link: undefined,
  route: undefined,
});
</script>
