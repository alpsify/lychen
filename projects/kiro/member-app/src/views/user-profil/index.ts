export { default as ViewUserProfil } from './ViewUserProfil.vue';

export const RouteViewUserProfil = {
	path: '/user-profil',
	component: () => import('./ViewUserProfil.vue'),
	name: 'user-profil',
};
