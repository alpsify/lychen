export default {
  property: {
    email: {
      label: 'Email',
      placeholder: 'Email address',
    },
    landRoles: {
      label: 'Roles',
    },
    state: {
      label: 'State',
      pending: 'Pending',
      accepted: 'Accepted',
      refused: 'Refused',
    },
    acceptedAt: {
      label: 'Accepted on {date}',
    },
    refusedAt: {
      label: 'Refused on {date}',
    },
    land: {
      label: 'Land',
    },
  },
  action: {
    create: {
      label: 'Invite someone',
      success: {
        message: 'Invitation created',
      },
      error: {
        message: 'Error while creating the invitation',
      },
      pending: {
        message: 'Creating the invitation',
      },
    },
    accept: {
      label: 'Accept the invitation',
      success: {
        message: 'Invitation accepted',
      },
      error: {
        message: 'Error while accepting the invitation',
      },
      pending: {
        message: 'Accepting the invitation',
      },
    },
    refuse: {
      label: 'Refuse the invitation',
      success: {
        message: 'Invitation refused',
      },
      error: {
        message: 'Error while refusing the invitation',
      },
      pending: {
        message: 'Refusing the invitation',
      },
    },
    delete: {
      label: 'Delete the invitation',
      success: {
        message: 'Invitation deleted',
      },
      error: {
        message: 'Error while deleting the invitation',
      },
      pending: {
        message: 'Deleting the invitation',
      },
    },
  },
};
