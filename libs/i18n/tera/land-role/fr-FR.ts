export default {
  property: {
    name: {
      label: 'Nom',
      placeholder: 'Cultivateur',
    },
    permissions: {
      label: 'Permissions',
    },
    land_members: {
      default: 'aucune personne | {count} personne | {count} personnes',
    },
  },
  action: {
    create: {
      label: 'Créer un rôle',
      success: {
        message: 'Rôle créé',
      },
      error: {
        message: 'Erreur lors de la création du rôle',
      },
      pending: {
        message: 'Création du rôle en cours',
      },
    },
    update: {
      label: 'Mettre à jour le rôle',
      success: {
        message: 'Rôle mis à jour',
      },
      error: {
        message: 'Erreur lors de la mise à jour du rôle',
      },
      pending: {
        message: 'Mise à jour du rôle en cours',
      },
    },
    delete: {
      label: 'Supprimer le rôle',
      success: {
        message: 'Rôle supprimé',
      },
      error: {
        message: 'Erreur lors de la suppression du rôle',
      },
      pending: {
        message: 'Suppression du rôle en cours',
      },
    },
  },
};
