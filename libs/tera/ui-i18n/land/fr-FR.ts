export default {
  property: {
    name: {
      label: 'Nom',
      placeholder: 'Jardin de Lulu',
    },
    land_areas: {
      default: 'aucune zone | 1 zone | {count} zones',
    },
    surface: {
      label: 'Surface',
      description: "Surface total de l'espace de culture en m²",
      suffix: 'en m²',
      default: '{count} m²',
      placeholder: '100',
    },
    altitude: {
      label: 'Altitude',
      description: "Altitude moyenne de l'espace de culture en mètre",
      suffix: 'en m',
      default: '{count} m',
      placeholder: '345',
    },
  },
  action: {
    create: {
      label: "Créer l'espace de culture",
    },
  },
};
