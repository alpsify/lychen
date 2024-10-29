export { default as ViewAbout } from './ViewAbout.vue';

export const RouteViewAbout = {
	path: '/a-propos',
	component: () => import('./ViewAbout.vue'),
	name: 'about',
};
