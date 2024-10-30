import {animationConfig} from '@lychen/ui-css/tailwind/animationConfig';
import {colorsConfig} from '@lychen/ui-css/tailwind/colorsConfig';
import {fontsConfig} from '@lychen/ui-css/tailwind/fontsConfig';
import {keyframesConfig} from '@lychen/ui-css/tailwind/keyframesConfig';
import type {Config} from 'tailwindcss';

export default {
  darkMode: 'selector',
  safelist: ['dark'],
  prefix: '',

  content: ['./src/**/*.{vue,js,ts,jsx,tsx}', '../../../../libs/lychen/**/*.{vue,js,ts,jsx,tsx}'],

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
      colors: colorsConfig,
      keyframes: keyframesConfig,
      animation: animationConfig,
    },
  },
  plugins: [],
} satisfies Config;
