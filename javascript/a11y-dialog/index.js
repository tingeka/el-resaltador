import A11yDialog from 'a11y-dialog';
import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock';

const container = document.getElementById('search-modal');
const dialog = new A11yDialog(container);

dialog
	.on('show', () => disableBodyScroll(container))
	.on('hide', () => enableBodyScroll(container));
