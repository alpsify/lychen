import { animationConfig } from '@lychen/ui-css/tailwind/animationConfig';
import { fontsConfig } from '@lychen/ui-css/tailwind/fontsConfig';
import { keyframesConfig } from '@lychen/ui-css/tailwind/keyframesConfig';
import type { Config } from 'tailwindcss';
import { contentConfig } from '@lychen/ui-css/tailwind/contentConfig';

export default {
  darkMode: 'selector',
  safelist: ['dark'],
  prefix: '',

  content: contentConfig,

  theme: {
    container: {
      center: true,
      padding: '2rem',
      screens: {
        '2xl': '1400px',
      },
    },
    fontFamily: fontsConfig,
    extend: {
      keyframes: keyframesConfig,
      animation: animationConfig,
    },
  },
  plugins: [],
} satisfies Config;
