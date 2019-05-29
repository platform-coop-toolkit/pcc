// Import external dependencies
import 'custom-event-polyfill';

// Import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import pccEvent from './routes/event';


// Populate Router instance with DOM routes
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Single event
  pccEvent,
});

// Load Events
document.addEventListener('DOMContentLoaded', () => routes.loadEvents());
