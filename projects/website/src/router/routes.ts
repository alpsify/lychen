import { RouteRecordRaw } from 'vue-router';

import { RouteViewAbout } from '@/views/about';
import { RouteViewPrice } from '@/views/price';

import { RouteViewHome } from '../views/home';

const routes: RouteRecordRaw[] = [
	{
		path: '/',
		component: () => import('@layouts/main/LayoutMain.vue'),
		children: [RouteViewHome, RouteViewAbout, RouteViewPrice],
	},
];

export default routes;
