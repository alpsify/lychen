import type { RouterConfig } from '@nuxt/schema';
import { RouteViewPrice } from '@/pages/price';
import { RouteViewHome } from '@/pages/home';

export default {
  routes: (_routes) => [RouteViewHome, RouteViewPrice],
} satisfies RouterConfig;
