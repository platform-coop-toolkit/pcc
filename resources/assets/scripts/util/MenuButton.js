 import { createPopper } from '@popperjs/core';
 /**
 * Menu Button class.
 */
class MenuButton {
  /**
   * Constructor.
   *
   * @param {DomNode} container
   */
  constructor( container ) {
    this.container = container;
    this.label = this.container.querySelector( '.menu-button__label' );
    this.config = {
        placement: 'bottom',
        preventOverflow: true,
        boundariesElement: document.querySelector( 'main' ),
    };

    const { btn, menu } = this.initMenuButton();
    this.btn = btn;
    this.menu = menu;
    this.links = this.menu.querySelectorAll( 'a' );
    this.handleClick = this.handleClick.bind( this );
    this.handleKeyDown = this.handleKeyDown.bind( this );
    this.handleBlur = this.handleBlur.bind( this );
    this.addEventListeners();
  }

  /**
   * Create the dynamic menu button.
   */
  initMenuButton() {
    // Create button
    const btn = document.createElement( 'button' );
    btn.setAttribute( 'aria-expanded', 'false' );
    btn.setAttribute( 'class', 'button button--borderless' );
    btn.innerHTML = this.label.innerHTML;
    this.container.insertBefore( btn, this.label );
    this.container.removeChild( this.label );

    // Wrap menu
    const linkList = this.container.querySelector( '.link-list' );
    const menu = document.createElement( 'div' );
    const menuList = document.createElement( 'ul' );
    const arrow = document.createElement( 'span' );
    menu.classList.add( 'menu-button__menu' );
    arrow.classList.add( 'menu-button__menu__arrow' );
    arrow.setAttribute( 'data-popper-arrow', '' );
    menuList.innerHTML = linkList.innerHTML;
    Array.prototype.forEach.call( menuList.children, menuItem => {
      menuItem.removeAttribute( 'class' );
    } );
    menu.insertBefore( menuList, menu.firstChild );
    menu.insertBefore( arrow, menu.firstChild );
    this.container.insertBefore( menu, linkList );
    this.container.removeChild( linkList );

    return { btn, menu };
  }

  /**
   * Handle click.
   *
   * @param {Event} event
   */
  handleClick( event ) {
    if ( event.target.parentNode != this.container ) {
      this.btn.setAttribute( 'aria-expanded', false );
    } else {
      const expanded = 'true' === this.btn.getAttribute( 'aria-expanded' ) || false;
      this.btn.setAttribute( 'aria-expanded', !expanded );
      if ( false === expanded ) {
        createPopper( this.btn, this.menu, {
          placement: this.config.placement,
          preventOverflow:
              ( true === this.config.preventOverflow ) ?
                {
                  enabled: true,
                  boundariesElement: this.config.boundariesElement,
                } :
                {
                  enabled: false,
                },
          modifiers: [
            {
              name: 'offset',
              options: {
                offset: [0, 20],
              },
            },
          ],
        } );
      }
    }
  }

  /**
   * Handle blur.
   *
   * @param {Event} event
   */
  handleBlur( event ) {
    if ( event.target === this.links[this.links.length - 1] && event.relatedTarget && 'LI' !== event.relatedTarget.parentNode.nodeName ) {
      this.btn.setAttribute( 'aria-expanded', false );
    }
  }

  /**
   * Handle keydown.
   *
   * @param {Event} event
   */
  handleKeyDown( event ) {
    if ( 27 === event.keyCode ) {
      const restoreFocus = document.activeElement.closest( '.menu-button' ) === this.btn.parentNode;
      this.btn.setAttribute( 'aria-expanded', false );
      if ( restoreFocus ) this.btn.focus();
    }
  }

  /**
   * Add event listeners.
   */
  addEventListeners() {
    document.addEventListener( 'click', this.handleClick );
    document.addEventListener( 'keydown', this.handleKeyDown, false );
    Array.prototype.forEach.call( this.links, link => {
      link.addEventListener( 'blur', this.handleBlur, false );
    } );
  }
}
export default MenuButton;
