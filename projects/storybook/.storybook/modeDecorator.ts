/* eslint-disable @typescript-eslint/no-explicit-any */
import { onMounted, onUnmounted, ref, watch } from 'vue';
import type { Decorator } from '@storybook/vue3';
import { faSun } from '@fortawesome/pro-light-svg-icons/faSun';
import { faMoon } from '@fortawesome/pro-light-svg-icons/faMoon';
import { Icon } from '@lychen/vue-ui-components-core/icon';

export function ModeDecorator(story: any, context: any): any {
  const isDarkMode = ref(false);

  const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

  function setDarkModeAttribute(isDark: boolean) {
    if (isDark) {
      document.documentElement.setAttribute('data-theme', 'dark');
    } else {
      document.documentElement.removeAttribute('data-theme');
    }
  }

  function handleChange(event: MediaQueryListEvent) {
    isDarkMode.value = event.matches;
    setDarkModeAttribute(event.matches);
  }

  onMounted(() => {
    mediaQuery.addEventListener('change', handleChange);
    isDarkMode.value = mediaQuery.matches;
    setDarkModeAttribute(mediaQuery.matches); // Set initial attribute based on system preference
  });

  onUnmounted(() => {
    mediaQuery.removeEventListener('change', handleChange);
  });

  function toggleMode() {
    isDarkMode.value = !isDarkMode.value;
    setDarkModeAttribute(isDarkMode.value);
  }

  // Watch for changes in the `darkMode` parameter from the storybook-dark-mode addon
  watch(
    () => context.parameters.darkMode?.current, // Watch the specific 'current' property
    (currentMode) => {
      const newIsDark = currentMode === 'dark';
      if (isDarkMode.value !== newIsDark) {
        // Only update if the state actually changes
        isDarkMode.value = newIsDark;
        setDarkModeAttribute(newIsDark);
      }
    },
    { immediate: true }, // Run immediately to sync with initial addon state
  );

  return {
    components: { Story: story(), Icon: Icon }, // Removed faSun from components as it's only used in setup
    template: `
      <div class="grid grid-cols-[1fr_auto] gap-4">
        <div class="flex flex-row">
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
      // Expose necessary refs and functions to the template
      return {
        isDarkMode,
        toggleMode,
        faSun, // Keep icons available for the template binding
        faMoon,
      };
    },
  };
}
