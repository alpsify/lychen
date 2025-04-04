export default {
  property: {
    joinedAt: {
      label: "Date d'adhésion",
      default: 'A rejoint le {date}',
    },
    owner: {
      label: 'Propriétaire',
    },
    land: {
      label: 'Espace de culture',
    },
    person: {
      label: 'Personne',
    },
    landRoles: {
      label: 'Rôles',
    },
  },
  action: {
    update: {
      label: 'Mettre à jour le membre',
      success: {
        message: 'Membre mis à jour',
      },
      error: {
        message: 'Erreur lors de la mise à jour du membre',
      },
      pending: {
        message: 'Mise à jour du membre en cours',
      },
    },
    delete: {
      label: 'Supprimer le membre',
      success: {
        message: 'Membre supprimé',
      },
      error: {
        message: 'Erreur lors de la suppression du membre',
      },
      pending: {
        message: 'Suppression du membre en cours',
      },
    },
    leave: {
      label: "Quitter l'espace de culture",
      success: {
        message: "Vous avez quitté l'espace de culture",
      },
      error: {
        message: "Erreur lors de la tentative de quitter l'espace de culture",
      },
      pending: {
        message: "Tentative de quitter l'espace de culture en cours",
      },
    },
  },
};
