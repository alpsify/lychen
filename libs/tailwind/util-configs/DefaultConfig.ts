import { animationConfig } from './animationConfig';
import { colorsConfig } from './colorsConfig';
import { fontsConfig } from './fontsConfig';
import { keyframesConfig } from './keyframesConfig';
import type { Config } from 'tailwindcss';
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
      gridTemplateColumns: {
        fluid: 'repeat(auto-fill, minmax(300px, 1fr));',
      },
    },
  },
  plugins: [tailwindcssMotion],
} satisfies Config;
