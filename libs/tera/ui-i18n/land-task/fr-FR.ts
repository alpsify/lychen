export default {
  property: {
    title: {
      label: 'Titre',
    },
  },
  action: {
    create: {
      label: 'Créer la tâche',
      success: {
        message: 'Tâche créée',
      },
      error: {
        message: 'Erreur lors de la création de la tâche',
      },
      pending: {
        message: 'Création de la tâche en cours',
      },
    },
    update: {
      label: 'Mettre à jour la tâche',
      success: {
        message: 'Tâche mise à jour',
      },
      error: {
        message: 'Erreur lors de la mise à jour de la tâche',
      },
      pending: {
        message: 'Mise à jour de la tâche',
      },
    },
    delete: {
      label: 'Supprimer la tâche',
      success: {
        message: 'Tâche supprimée',
      },
      error: {
        message: 'Erreur lors de la suppression de la tâche',
      },
      pending: {
        message: 'Suppression de la tâche',
      },
    },
  },
};
