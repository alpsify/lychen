export interface FooterMenu {
	routeName: string;
	title: string;
}

const footerOtherMenus: FooterMenu[] = [
	{
		routeName: 'about',
		title: 'A Propos',
	},
	{
		routeName: 'price',
		title: 'Tarifs',
	},
];

export { footerOtherMenus };
