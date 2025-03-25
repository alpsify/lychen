import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';
import { computed, type Ref } from 'vue';

export function useLandGuard(
  landMember:
    | Ref<components['schemas']['LandMember.jsonld-user.land_member.get-me'] | undefined>
    | undefined,
  permissions: [string],
  strategy: 'unanimous' | 'oneof' = 'unanimous',
) {
  const allowed = computed(() => {
    if (!landMember || !landMember.value) {
      return false;
    }

    if (landMember.value.owner) {
      return true;
    }

    if (!landMember.value.landRoles) {
      return false;
    }

    const allPermissions = landMember.value.landRoles.flatMap((role) => role.permissions);
    return permissions.every((permission) => allPermissions.includes(permission));
  });

  const isOwner = computed(() => landMember?.value?.owner);

  return { allowed, isOwner };
}
