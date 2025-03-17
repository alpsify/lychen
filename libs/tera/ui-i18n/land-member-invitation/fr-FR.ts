export default {
  property: {
    email: {
      label: 'Email',
      placeholder: 'Adresse email',
    },
    landRoles: {
      label: 'Rôles',
    },
    state: {
      label: 'État',
      pending: 'En attente',
      accepted: 'Acceptée',
      refused: 'Refusée',
    },
    acceptedAt: {
      label: 'Acceptée le {date}',
    },
    refusedAt: {
      label: 'Refusée le {date}',
    },
    land: {
      label: 'Terrain',
    },
  },
  action: {
    create: {
      label: "Inviter quelqu'un",
      success: {
        message: 'Invitation créée',
      },
      error: {
        message: "Erreur lors de la création de l'invitation",
      },
      pending: {
        message: "Création de l'invitation en cours",
      },
    },
    accept: {
      label: "Accepter l'invitation",
      success: {
        message: 'Invitation acceptée',
      },
      error: {
        message: "Erreur lors de l'acceptation de l'invitation",
      },
      pending: {
        message: "Acceptation de l'invitation en cours",
      },
    },
    refuse: {
      label: "Refuser l'invitation",
      success: {
        message: 'Invitation refusée',
      },
      error: {
        message: "Erreur lors du refus de l'invitation",
      },
      pending: {
        message: "Refus de l'invitation en cours",
      },
    },
    delete: {
      label: "Supprimer l'invitation",
      success: {
        message: 'Invitation supprimée',
      },
      error: {
        message: "Erreur lors de la suppression de l'invitation",
      },
      pending: {
        message: "Suppression de l'invitation en cours",
      },
    },
  },
};
