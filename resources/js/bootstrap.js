import axios from 'axios';
import '@fortawesome/fontawesome-free/css/all.min.css';

// ClipboardJS Dependency
import ClipboardJS from 'clipboard';
window.clipboard = new ClipboardJS('.copy-button');

// JS Confetti Dependency
import JSConfetti from 'js-confetti';
window.jsConfetti = new JSConfetti();

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

import './magicmouse.js';
import './echo';
