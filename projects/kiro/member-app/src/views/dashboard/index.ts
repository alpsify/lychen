export { default as ViewDashboard } from './ViewDashboard.vue';

export const RouteViewDashboard = {
	path: '/dashboard',
	component: () => import('./ViewDashboard.vue'),
	name: 'dashboard',
};
