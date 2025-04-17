export default {
  property: {
    title: {
      label: 'Titre',
      placeholder: 'Recherche co-jardiniers',
    },
    preferred_garden_interaction_mode: {
      label: "Mode d'interaction préféré",
      placeholder: "Sélectionner le mode d'interaction préféré",
      options: {
        together: 'Ensemble',
        alone: 'Seul',
        no_preference: 'Pas de préférence',
        together_but_not_all_time: 'Ensemble mais pas tout le temps',
      },
    },
    sharing_conditions: {
      label: 'Conditions de partage',
      placeholder: 'Sélectionner les conditions de partage',
      options: {
        general_maintenance: 'Entretien général',
        gardening: 'Jardinage',
        beehives: 'Ruches',
        vegetable_sharing: 'Partage de légumes',
        fruit_sharing: 'Partage de fruits',
        flower_planting: 'Plantation de fleurs',
        tree_planting: "Plantation d'arbres",
      },
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
