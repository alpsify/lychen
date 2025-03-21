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
      success: {
        message: 'Espace de culture créé',
      },
      error: {
        message: "Erreur lors de la création de l'espace de culture",
      },
      pending: {
        message: "Création de l'espace de culture en cours",
      },
    },
    update: {
      label: "Mettre à jour l'espace de culture",
      success: {
        message: 'Espace de culture mis à jour',
      },
      error: {
        message: "Erreur lors de la mise à jour de l'espace de culture",
      },
      pending: {
        message: "Mise à jour de l'espace de culture en cours",
      },
    },
    delete: {
      label: "Supprimer l'espace de culture",
      success: {
        message: 'Espace de culture supprimé',
      },
      error: {
        message: "Erreur lors de la suppression de l'espace de culture",
      },
      pending: {
        message: "Suppression de l'espace de culture en cours",
      },
    },
  },
};
