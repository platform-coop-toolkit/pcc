import MenuButton from '../util/MenuButton'

export default {
  init() {
    const sectors = document.querySelector( '.sectors' );
    if ( sectors ) {
      new MenuButton (sectors);
    }

    const regions = document.querySelector( '.regions' );
    if ( regions ) {
      new MenuButton (regions);
    }
  },
  finalize() {
    // JavaScript to be fired on a page, after the init JS
  },
};
