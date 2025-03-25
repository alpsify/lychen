export default {
  property: {
    joinedAt: {
      label: 'Joined at',
      default: 'Joined on {date}',
    },
    owner: {
      label: 'Owner',
    },
    land: {
      label: 'Land',
    },
    person: {
      label: 'Person',
    },
    landRoles: {
      label: 'Roles',
    },
  },
  action: {
    update: {
      label: 'Update the member',
      success: {
        message: 'Member updated',
      },
      error: {
        message: 'Error while updating the member',
      },
      pending: {
        message: 'Updating the member',
      },
    },
    delete: {
      label: 'Delete the member',
      success: {
        message: 'Member deleted',
      },
      error: {
        message: 'Error while deleting the member',
      },
      pending: {
        message: 'Deleting the member',
      },
    },
    leave: {
      label: 'Leave the land',
      success: {
        message: 'You left the land',
      },
      error: {
        message: 'Error while trying to leave the land',
      },
      pending: {
        message: 'Trying to leave the land',
      },
    },
  },
};
