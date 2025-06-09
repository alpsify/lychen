export default {
  property: {
    kind: {
      label: "Type d'espace",
      open_soil: {
        default: 'Pleine terre',
        description: 'Cultures directement en sol naturel',
      },
      soil_less: {
        default: 'Hors-sol',
        description: 'Cultures en bacs, pots, hydroponie, aquaponie, etc',
      },
    },
    surface: {
      label: 'Surface',
      suffix: 'en m²',
      default: '{count} m²',
    },
  },
};
