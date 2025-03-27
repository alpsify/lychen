/* eslint-disable @typescript-eslint/no-explicit-any */
import { onMounted, onUnmounted, ref, watch } from 'vue';
import type { Decorator } from '@storybook/vue3';
import { faSun } from '@fortawesome/pro-light-svg-icons/faSun';
import { faMoon } from '@fortawesome/pro-light-svg-icons/faMoon';
import { Icon } from '@lychen/vue-ui-components-core/icon';

export function ModeDecorator(story: any, context: any): any {
  const isDarkMode = ref(false);

  const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

  function handleChange(event: MediaQueryListEvent) {
    isDarkMode.value = event.matches;
    document.documentElement.classList.toggle('dark', event.matches);
  }

  onMounted(() => {
    mediaQuery.addEventListener('change', handleChange);
    isDarkMode.value = mediaQuery.matches;
    document.documentElement.classList.toggle('dark', mediaQuery.matches);
  });

  onUnmounted(() => {
    mediaQuery.removeEventListener('change', handleChange);
  });

  function toggleMode() {
    isDarkMode.value = !isDarkMode.value;
    document.documentElement.classList.toggle('dark', isDarkMode.value);
  }

  // Watch for changes in the `darkMode` parameter from the story
  watch(
    () => context.parameters.darkMode,
    (newDarkMode) => {
      if (newDarkMode?.current === 'dark') {
        isDarkMode.value = true;
        document.documentElement.classList.add('dark');
      } else if (newDarkMode?.current === 'light') {
        isDarkMode.value = false;
        document.documentElement.classList.remove('dark');
      }
    },
    { immediate: true },
  );

  return {
    components: { Story: story(), Icon: Icon, faSun: faSun },
    template: `      
      <div class="grid grid-cols-[1fr_auto] gap-4">
        <div>
          <Story />
        </div>
        <button
          @click="toggleMode"
          class="z-[9999] px-3 py-2 rounded-full border-none h-10 w-10 bg-surface-container-highest text-on-surface-container-highest cursor-pointer"
          aria-label="Toggle dark mode"
          :aria-pressed="isDarkMode"
        >
          <Icon :icon="isDarkMode ? faSun : faMoon" />
        </button>
      </div>
    `,
    setup() {
      return {
        isDarkMode,
        toggleMode,
        faSun,
        faMoon,
      };
    },
  };
}
