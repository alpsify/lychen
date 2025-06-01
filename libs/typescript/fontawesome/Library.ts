import { library, type IconDefinition, type IconPack } from '@fortawesome/fontawesome-svg-core';

export function addToLibrary(icons: IconDefinition[] | Record<string, IconDefinition>) {
  const allIcons: (IconDefinition | IconPack)[] = [];
  for (const key in icons) {
    allIcons.push(icons[key]);
  }
  library.add(...allIcons);
}
