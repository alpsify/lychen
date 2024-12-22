export const RoutePageHome = {
  path: '/',
  component: () => import('./PageHome.vue'),
  name: 'home',
};

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
