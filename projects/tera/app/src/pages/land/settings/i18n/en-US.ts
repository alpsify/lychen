export default {
  title: 'Settings',
  tabs: {
    general: {
      title: 'General',
      danger_zone: {
        title: 'Danger zone',
        description: 'Performing actions in this zone may result in data loss. Be careful.',
        transfer: {
          title: 'Transfer ownership',
          description: 'Transfer this culture space to another user.',
          button: {
            label: 'Transfer',
          },
        },
        delete: {
          title: 'Delete this culture space',
          description:
            "Once you've deleted a culture space, there's no going back. Be sure of your decision.",
          button: {
            label: 'Delete',
          },
          dialog: {
            button: {
              confirm: {
                label: 'Confirm deletion',
              },
            },
          },
          toast: {
            success: {
              message: 'Culture space deleted',
            },
          },
        },
      },
    },
    team: {
      title: 'Team',
      members: {
        title: 'Members',
        description: 'The members of your culture space.',
      },
      invitations: {
        title: 'Invitations',
        description: 'Manage pending invitations to join your culture space.',
        none: 'No pending invitations',
      },
      roles: {
        title: 'Roles',
        description:
          'Configure and manage the different roles and permissions within your culture space.',
      },
    },
    subscription: {
      title: 'Subscription',
    },
    notifications: {
      title: 'Notifications',
    },
    api: {
      title: 'API',
    },
  },
};
