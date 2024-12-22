import { animationConfig } from './animationConfig';
import { colorsConfig } from './colorsConfig';
import { fontsConfig } from './fontsConfig';
import { keyframesConfig } from './keyframesConfig';
import type { Config } from 'tailwindcss';
import animate from 'tailwindcss-animate';
import { contentConfig } from './contentConfig';
import tailwindcssMotion from 'tailwindcss-motion';

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
  plugins: [animate, tailwindcssMotion],
} satisfies Config;
