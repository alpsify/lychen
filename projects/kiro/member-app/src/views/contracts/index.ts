export { default as ViewContracts } from './ViewContracts.vue';

export const RouteViewContracts = {
	path: '/contracts',
	component: () => import('./ViewContracts.vue'),
	name: 'contracts',
};
