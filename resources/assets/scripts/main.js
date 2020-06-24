// Import external dependencies
import 'custom-event-polyfill';
import 'jquery';

// Import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import singlePccEvent from './routes/event';
import story from './routes/story.js';

// Populate Router instance with DOM routes
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Single event
  singlePccEvent,
  // Stories page
  story,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
