import { useDark, useToggle } from '@vueuse/core';

export function usePreferredColorScheme() {
  const isDark = useDark({
    selector: 'html',
    attribute: 'data-theme',
    valueDark: 'dark',
    valueLight: 'light',
  });
  const toggleDark = useToggle(isDark);

  try {
    if (!localStorage.getItem('vueuse-color-scheme')) {
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
