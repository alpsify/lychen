export default {
  title: 'Réglages',
  tabs: {
    general: {
      title: 'Général',
      danger_zone: {
        title: 'Zone de danger',
        description:
          'Effectuer des actions dans cette zone peut entraîner une perte de données. Soyez prudent.',
        transfer: {
          title: 'Transférer la propriété',
          description: 'Transférer cet espace de culture à un autre utilisateur.',
          button: {
            label: 'Transférer',
          },
        },
        delete: {
          title: 'Supprimer cet espace de culture',
          description:
            "Une fois que vous avez supprimé un espace de culture, il n'est plus possible de revenir en arrière. Soyez certain de votre décision.", // Changed the description to be more natural in French
          button: {
            label: 'Supprimer',
          },
          dialog: {
            button: {
              confirm: {
                label: 'Confirmer la suppression',
              },
            },
          },
          toast: {
            success: {
              message: 'Espace de culture supprimé',
            },
          },
        },
      },
    },
    team: {
      title: 'Équipe',
      members: {
        title: 'Membres',
        description: 'Les membres de votre espace de culture.',
      },
      invitations: {
        title: 'Invitations',
        description: 'Gérez les invitations en attente pour rejoindre votre espace de culture.',
      },
      roles: {
        title: 'Rôles',
        description:
          'Configurez et gérez les différents rôles et permissions au sein de votre espace de culture.',
      },
    },

    subscription: {
      title: 'Abonnement',
    },
    notifications: {
      title: 'Notifications',
    },
    api: {
      title: 'API',
    },
  },
};
