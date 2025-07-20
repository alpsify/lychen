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
      success: {
        message: 'Cultivated space created',
      },
      error: {
        message: 'Error creating the cultivated space',
      },
      pending: {
        message: 'Creating the cultivated space',
      },
    },
    update: {
      label: 'Update the cultivated space',
      success: {
        message: 'Cultivated space updated',
      },
      error: {
        message: 'Error updating the cultivated space',
      },
      pending: {
        message: 'Updating the cultivated space',
      },
    },
    delete: {
      label: 'Delete the cultivated space',
      success: {
        message: 'Cultivated space deleted',
      },
      error: {
        message: 'Error deleting the cultivated space',
      },
      pending: {
        message: 'Deleting the cultivated space',
      },
    },
  },
};
