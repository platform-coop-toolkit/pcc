// Import external dependencies
import 'custom-event-polyfill';

// Import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import benefits from './routes/benefits';


// Populate Router instance with DOM routes
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Benefits page
  benefits,
});

// Load Events
document.addEventListener('DOMContentLoaded', () => routes.loadEvents());
