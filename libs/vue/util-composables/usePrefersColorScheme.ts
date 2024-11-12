import { useDark, useToggle } from '@vueuse/core';

export function usePrefersColorScheme() {
  const isDark = useDark();
  const toggleDark = useToggle(isDark);

  try {
    if (!localStorage.getItem('color-scheme')) {
      if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        toggleDark(true);
      } else {
        toggleDark(false);
      }
    }
  } catch (error) {
    toggleDark(true);
  }

  return {
    isDark,
    toggleDark,
  };
}
