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
            title: 'Confirm culture space deletion',
            description:
              'Are you sure you want to delete this culture space? This action is irreversible.',
            button: {
              cancel: {
                label: 'Cancel',
              },
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
    },
    subscription: {
      title: 'Subscription',
    },
    notifications: {
      title: 'Notifications',
    },
  },
};
