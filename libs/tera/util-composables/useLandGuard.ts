import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';
import { computed, inject, type InjectionKey, type Ref } from 'vue';

export function useLandGuard(
  key: InjectionKey<
    Ref<components['schemas']['LandMember.jsonld-user.land_member.get-me'] | undefined>
  >,
) {
  const landMember = inject(key);

  function isGranted(permissions: string[]) {
    return computed(() => {
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
  }

  const isOwner = computed(() => landMember?.value?.owner);

  return {
    landMember,
    isGranted,
    isOwner,
  };
}
