import { faLinkedin } from '@fortawesome/free-brands-svg-icons/faLinkedin';
import { faGithub } from '@fortawesome/free-brands-svg-icons/faGithub';
import { faDiscord } from '@fortawesome/free-brands-svg-icons/faDiscord';

import { faRocketLaunch } from '@fortawesome/duotone-light-svg-icons/faRocketLaunch';
import { faBullhorn } from '@fortawesome/duotone-light-svg-icons/faBullhorn';
import { faArrowUpRight } from '@fortawesome/duotone-light-svg-icons/faArrowUpRight';
import { faArrowRight } from '@fortawesome/duotone-light-svg-icons/faArrowRight';
import { faArrowLeft } from '@fortawesome/duotone-light-svg-icons/faArrowLeft';
import { faChevronRight } from '@fortawesome/duotone-light-svg-icons/faChevronRight';
import { faChevronDown } from '@fortawesome/duotone-light-svg-icons/faChevronDown';
import { faMegaphone } from '@fortawesome/duotone-light-svg-icons/faMegaphone';
import { faLink } from '@fortawesome/duotone-light-svg-icons/faLink';
import { faUser } from '@fortawesome/duotone-light-svg-icons/faUser';
import { faCoffee } from '@fortawesome/duotone-light-svg-icons/faCoffee';
import { faMoon } from '@fortawesome/duotone-light-svg-icons/faMoon';
import { faBrightness } from '@fortawesome/duotone-light-svg-icons/faBrightness';
import { faTimes } from '@fortawesome/duotone-light-svg-icons/faTimes';
import { faBarsStaggered } from '@fortawesome/duotone-light-svg-icons/faBarsStaggered';
import { faChartNetwork } from '@fortawesome/duotone-light-svg-icons/faChartNetwork';
import { faHandsHoldingHeart } from '@fortawesome/duotone-light-svg-icons/faHandsHoldingHeart';
import { faHandHoldingHeart } from '@fortawesome/duotone-light-svg-icons/faHandHoldingHeart';
import { faServer } from '@fortawesome/duotone-light-svg-icons/faServer';

import { library } from '@fortawesome/fontawesome-svg-core';

export function loadFontAwesomeStyles() {
  library.add([
    faRocketLaunch,
    faBullhorn,
    faArrowUpRight,
    faArrowRight,
    faArrowLeft,
    faChevronRight,
    faChevronDown,
    faMegaphone,
    faLink,
    faUser,
    faCoffee,
    faMoon,
    faBrightness,
    faTimes,
    faBarsStaggered,
    faChartNetwork,
    faHandsHoldingHeart,
    faHandHoldingHeart,
    faServer,
  ]);
  library.add(faGithub);
  library.add(faDiscord);
  library.add(faLinkedin);
}
