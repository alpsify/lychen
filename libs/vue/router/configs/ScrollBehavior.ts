import { type RouterScrollBehavior } from 'vue-router';

// eslint-disable-next-line func-style
export const scrollBehavior: RouterScrollBehavior = (to, from, savedPosition) => {
  if (to.hash) {
    return {
      el: to.hash,
      behavior: 'smooth',
    };
  }

  return { top: 0 };
};
