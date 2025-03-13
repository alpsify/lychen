export default {
  property: {
    name: {
      label: 'Name',
      placeholder: "Lulu's Garden",
    },
    land_areas: {
      default: 'no area | 1 area | {count} areas',
    },
    surface: {
      label: 'Surface',
      description: 'Total surface area of the cultivated space in m²',
      suffix: 'in m²',
      default: '{count} m²',
      placeholder: '100',
    },
    altitude: {
      label: 'Altitude',
      description: 'Average altitude of the cultivated space in meters',
      suffix: 'in m',
      default: '{count} m',
      placeholder: '345',
    },
  },
  action: {
    create: {
      label: 'Create the cultivated space',
    },
  },
};
