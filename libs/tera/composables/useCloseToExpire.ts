import { computed } from 'vue';
import { today, getLocalTimeZone, parseDate } from '@internationalized/date';

export function useCloseToExpire(expirationDate?: string | null) {
  const isCloseToExpire = computed(() => {
    if (!expirationDate) {
      return false;
    }
    try {
      const expiration = parseDate(expirationDate);
      const now = today(getLocalTimeZone());
      const differenceInDays = expiration.compare(now);
      return differenceInDays >= 0 && differenceInDays <= 3;
    } catch (error) {
      return false;
    }
  });

  return {
    isCloseToExpire,
  };
}
