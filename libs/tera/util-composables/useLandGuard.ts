import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';
import { computed, type Ref } from 'vue';
import { type ObjectValues } from '@lychen/typescript-util-object/Object';

export const LAND_GUARD_STRATEGY = {
  Unanimous: 'unanimous',
  Affirmative: 'affirmative',
} as const;

export type LandGuardStrategy = ObjectValues<typeof LAND_GUARD_STRATEGY>;

export function useLandGuard(
  landMember:
    | Ref<components['schemas']['LandMember.jsonld-user.land_member.get-me'] | undefined>
    | undefined,
  permissions: [string],
  strategy: 'unanimous' | 'affirmative' = 'unanimous',
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
    if (strategy === 'unanimous') {
      return permissions.every((permission) => allPermissions.includes(permission));
    } else if (strategy === 'affirmative') {
      return permissions.some((permission) => allPermissions.includes(permission));
    }
    return false;
  });

  return { allowed };
}
