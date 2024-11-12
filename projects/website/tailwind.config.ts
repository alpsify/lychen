import { animationConfig } from '@lychen/ui-css/tailwind/animationConfig';
import { colorsConfig } from '@lychen/ui-css/tailwind/colorsConfig';
import { fontsConfig } from '@lychen/ui-css/tailwind/fontsConfig';
import { keyframesConfig } from '@lychen/ui-css/tailwind/keyframesConfig';
import type { Config } from 'tailwindcss';
import animate from 'tailwindcss-animate';
import { contentConfig } from '@lychen/ui-css/tailwind/contentConfig';

export default {
  darkMode: 'class',
  safelist: ['selector'],
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
    extend: {
      fontFamily: fontsConfig,
      colors: colorsConfig,
      keyframes: keyframesConfig,
      animation: animationConfig,
    },
  },
  plugins: [animate],
} satisfies Config;
