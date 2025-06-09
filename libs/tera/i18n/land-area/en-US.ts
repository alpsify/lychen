export default {
  property: {
    kind: {
      label: 'Type of space',
      open_soil: {
        default: 'Open soil',
        description: 'Crops directly in natural soil',
      },
      soil_less: {
        default: 'Soilless',
        description: 'Crops in trays, pots, hydroponics, aquaponics, etc',
      },
    },
    surface: {
      label: 'Surface',
      suffix: 'in m²',
      default: '{count} m²',
    },
  },
};
