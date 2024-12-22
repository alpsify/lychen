import { fal } from '@fortawesome/pro-light-svg-icons';
import { fab } from '@fortawesome/free-brands-svg-icons';
import { fadl } from '@fortawesome/duotone-light-svg-icons';

import { library } from '@fortawesome/fontawesome-svg-core';

export function loadFontAwesomeStyles() {
  library.add(fal);
  library.add(fadl);
  library.add(fab);
}
