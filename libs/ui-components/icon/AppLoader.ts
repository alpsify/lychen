import { faLinkedin } from '@fortawesome/free-brands-svg-icons/faLinkedin';
import { faGithub } from '@fortawesome/free-brands-svg-icons/faGithub';
import { faDiscord } from '@fortawesome/free-brands-svg-icons/faDiscord';

import { faRocketLaunch } from '@fortawesome/pro-light-svg-icons/faRocketLaunch';
import { faBullhorn } from '@fortawesome/pro-light-svg-icons/faBullhorn';
import { faArrowUpRight } from '@fortawesome/pro-light-svg-icons/faArrowUpRight';
import { faArrowRight } from '@fortawesome/pro-light-svg-icons/faArrowRight';
import { faArrowLeft } from '@fortawesome/pro-light-svg-icons/faArrowLeft';
import { faChevronRight } from '@fortawesome/pro-light-svg-icons/faChevronRight';
import { faChevronDown } from '@fortawesome/pro-light-svg-icons/faChevronDown';
import { faMegaphone } from '@fortawesome/pro-light-svg-icons/faMegaphone';
import { faLink } from '@fortawesome/pro-light-svg-icons/faLink';
import { faUser } from '@fortawesome/pro-light-svg-icons/faUser';
import { faUsers } from '@fortawesome/pro-light-svg-icons/faUsers';
import { faCoffee } from '@fortawesome/pro-light-svg-icons/faCoffee';
import { faMoon } from '@fortawesome/pro-light-svg-icons/faMoon';
import { faBrightness } from '@fortawesome/pro-light-svg-icons/faBrightness';
import { faTimes } from '@fortawesome/pro-light-svg-icons/faTimes';
import { faBarsStaggered } from '@fortawesome/pro-light-svg-icons/faBarsStaggered';
import { faChartNetwork } from '@fortawesome/pro-light-svg-icons/faChartNetwork';
import { faHandsHoldingHeart } from '@fortawesome/pro-light-svg-icons/faHandsHoldingHeart';
import { faHandHoldingHeart } from '@fortawesome/pro-light-svg-icons/faHandHoldingHeart';
import { faServer } from '@fortawesome/pro-light-svg-icons/faServer';
import { faPlus } from '@fortawesome/pro-light-svg-icons/faPlus';
import { faMagnifyingGlassLocation } from '@fortawesome/pro-light-svg-icons/faMagnifyingGlassLocation';
import { faPeopleGroup } from '@fortawesome/pro-light-svg-icons/faPeopleGroup';
import { faTreeCity } from '@fortawesome/pro-light-svg-icons/faTreeCity';
import { faHouse } from '@fortawesome/pro-light-svg-icons/faHouse';
import { faBuildingMagnifyingGlass } from '@fortawesome/pro-light-svg-icons/faBuildingMagnifyingGlass';
import { faClipboardListCheck } from '@fortawesome/pro-light-svg-icons/faClipboardListCheck';
import { faBell } from '@fortawesome/pro-light-svg-icons/faBell';
import { faGear } from '@fortawesome/pro-light-svg-icons/faGear';
import { faListUl } from '@fortawesome/pro-light-svg-icons/faListUl';
import { faMicrophone } from '@fortawesome/pro-light-svg-icons/faMicrophone';
import { faKeyboard } from '@fortawesome/pro-light-svg-icons/faKeyboard';
import { faCamera } from '@fortawesome/pro-light-svg-icons/faCamera';
import { faEllipsisVertical } from '@fortawesome/pro-light-svg-icons/faEllipsisVertical';
import { faCalendarCircleExclamation } from '@fortawesome/pro-light-svg-icons/faCalendarCircleExclamation';
import { faCircleDot } from '@fortawesome/pro-light-svg-icons/faCircleDot';
import { faCircle } from '@fortawesome/pro-light-svg-icons/faCircle';
import { faLanguage } from '@fortawesome/pro-light-svg-icons/faLanguage';
import { faMinus } from '@fortawesome/pro-light-svg-icons/faMinus';
import { faCheck } from '@fortawesome/pro-light-svg-icons/faCheck';
import { faStar } from '@fortawesome/pro-light-svg-icons/faStar';

import { library } from '@fortawesome/fontawesome-svg-core';

export function loadFontAwesomeStyles() {
  library.add([
    faRocketLaunch,
    faStar,
    faBullhorn,
    faCheck,
    faArrowUpRight,
    faCircleDot,
    faCircle,
    faLanguage,
    faMinus,
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
    faPlus,
    faMagnifyingGlassLocation,
    faBuildingMagnifyingGlass,
    faPeopleGroup,
    faTreeCity,
    faUsers,
    faHouse,
    faClipboardListCheck,
    faBell,
    faGear,
    faListUl,
    faMicrophone,
    faKeyboard,
    faCamera,
    faEllipsisVertical,
    faCalendarCircleExclamation,
  ]);
  library.add(faGithub);
  library.add(faDiscord);
  library.add(faLinkedin);
}
