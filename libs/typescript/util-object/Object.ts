export type ObjectValues<T> = T[keyof T];

export type Prettify<T> = {
  [K in keyof T]: T[K];
};

export type Writeable<T> = { -readonly [P in keyof T]: T[P] };
