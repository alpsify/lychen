export function extractValuesByKey<T, K extends keyof T>(
  list: T[],
  key: K,
): Exclude<T[K], undefined>[] {
  return list.map((item) => item[key] as Exclude<T[K], undefined>);
}
