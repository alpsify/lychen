import DefaultConfig from '@lychen/tailwind-configs/DefaultConfig';

export default {
  ...DefaultConfig,
  content: ['./src/**/*.{vue,js,ts,jsx,tsx}', '../../../libs/**/*.{vue,js,ts,jsx,tsx}'],
};
