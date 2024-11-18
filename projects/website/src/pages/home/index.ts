export { default as PageHome } from './PageHome.vue';

export const RoutePageHome = {
  path: '/',
  component: () => import('./PageHome.vue'),
  name: 'home',
};

export const features = [
  {
    title: 'Consommation alimentaire',
    description: 'We automatically save your files as you type.',
    routeName: '',
    image:
      'https://images.pexels.com/photos/1640772/pexels-photo-1640772.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    cta: 'En savoir plus',
    class: 'lg:row-start-1 lg:row-end-4 lg:col-start-2 lg:col-end-3',
  },
  {
    title: 'Production alimentaire',
    description: 'Search through all your files in one place.',
    routeName: '',
    image:
      'https://images.pexels.com/photos/6631952/pexels-photo-6631952.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    cta: 'En savoir plus',
    class: 'lg:col-start-1 lg:col-end-2 lg:row-start-1 lg:row-end-3',
  },
  {
    title: 'Environnement',
    description: 'Supports 100+ languages and counting.',
    routeName: '',
    image:
      'https://images.pexels.com/photos/807598/pexels-photo-807598.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    cta: 'En savoir plus',
    class: 'lg:col-start-1 lg:col-end-2 lg:row-start-3 lg:row-end-4',
  },
  {
    title: 'Valorisation des déchets organiques',
    description: 'Use the calendar to filter your files by util-date.',
    routeName: '',
    image:
      'https://images.pexels.com/photos/7728736/pexels-photo-7728736.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    cta: 'En savoir plus',
    class: 'lg:col-start-3 lg:col-end-3 lg:row-start-1 lg:row-end-2',
  },
  {
    title: 'Activité du territoire',
    description: 'Get notified when someone shares a file or mentions you in a comment.',
    routeName: '',
    image:
      'https://images.pexels.com/photos/4880395/pexels-photo-4880395.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    cta: 'En savoir plus',
    class: 'lg:col-start-3 lg:col-end-3 lg:row-start-2 lg:row-end-4',
  },
];

export const actors = [
  {
    title: 'Collectivités',
    icon: ['fal', 'school-flag'],
    text: "Les collectivités locales jouent un rôle crucial en soutenant les initiatives durables, en facilitant l'accès aux ressources et en promouvant des politiques favorables à l'agriculture écologique et à la gestion des déchets.",
  },
  {
    title: 'Citoyen·ne·s',
    icon: ['fal', 'user'],
    text: "Les citoyens sont au cœur de la transformation vers une alimentation durable. Leur engagement dans des pratiques respectueuses de l'environnement et leur participation aux projets communautaires renforcent l'impact de la plateforme.",
  },
  {
    title: 'Entreprises',
    icon: ['fal', 'briefcase'],
    text: 'Les entreprises peuvent contribuer en adoptant des pratiques durables, en soutenant les initiatives locales et en intégrant des solutions innovantes pour réduire leur empreinte écologique et promouvoir une agriculture responsable.',
  },
  {
    title: 'Associations',
    icon: ['fal', 'hand-holding-heart'],
    text: 'Les associations jouent un rôle clé en mobilisant les communautés, en sensibilisant le public et en mettant en œuvre des projets collaboratifs qui soutiennent une alimentation durable et solidaire.',
  },
  {
    title: 'Maraîcher·ère·s',
    icon: ['fal', 'tractor'],
    text: "Les maraîchers apportent leur expertise en agriculture et production locale, fournissant des produits frais et de qualité tout en adoptant des techniques respectueuses de l'environnement.",
  },
  {
    title: 'Chercheur·euse·s',
    icon: ['fal', 'flask'],
    text: "Les chercheurs contribuent par leurs études et innovations, apportant des solutions scientifiques aux défis de l'agriculture durable et aidant à optimiser les pratiques pour une meilleure gestion des ressources naturelles.",
  },
];
