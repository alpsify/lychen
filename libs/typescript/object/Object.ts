export type ObjectValues<T> = T[keyof T];

export type Prettify<T> = {
  [K in keyof T]: T[K];
};

export type Writeable<T> = { -readonly [P in keyof T]: T[P] };

export function extractValuesByKey<T, K extends keyof T>(
  list: T[],
  key: K,
): Exclude<T[K], undefined>[] {
  return list.map((item) => item[key] as Exclude<T[K], undefined>);
}
