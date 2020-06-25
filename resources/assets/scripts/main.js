// Import external dependencies
import 'custom-event-polyfill';
import 'jquery';

// Import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import singlePccEvent from './routes/event';
import stories from './routes/stories.js';

// Populate Router instance with DOM routes
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Single event
  singlePccEvent,
  // Stories page
  stories,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
