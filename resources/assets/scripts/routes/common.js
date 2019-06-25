export default {
  init() {
    // JavaScript to be fired on all pages
    const cards = document.querySelectorAll('.card');
    Array.prototype.forEach.call(cards, card => {
        let down, up, link = card.querySelector('.title a');
        card.style.cursor = 'pointer';
        card.onmousedown = () => down = +new Date();
        card.onmouseup = () => {
            up = +new Date();
            if ((up - down) < 200) {
                link.click();
            }
        }
    });

    const menuToggle = document.querySelector('#site-navigation > button');
    const primaryMenu = document.getElementById('menu-primary');
    const topLevelMenuItems = document.querySelectorAll('#menu-primary > li > *')
    const parentMenus = primaryMenu.querySelectorAll('.menu-item-has-children');

    menuToggle.onclick = () => {
      const currentState = menuToggle.getAttribute( 'aria-expanded' );
      const newState = ( currentState !== 'true' );
      menuToggle.setAttribute( 'aria-expanded', newState );
    }

    Array.prototype.forEach.call(parentMenus, parentMenu => {
      const linkEl = parentMenu.querySelector('a');
      const menuButton = document.createElement('button');
      menuButton.setAttribute( 'aria-expanded', false );
      menuButton.innerHTML = linkEl.innerHTML;
      let icon = document.createElement('span');
      icon.classList.add('icon');
      menuButton.appendChild(icon);
      parentMenu.insertBefore(menuButton, parentMenu.firstChild);
      parentMenu.removeChild(linkEl);
      menuButton.addEventListener('click', () => {
        const currentState = menuButton.getAttribute( 'aria-expanded' );
        const newState = ( currentState !== 'true' );
        menuButton.setAttribute( 'aria-expanded', newState );
      });
      document.addEventListener( 'click', event => {
        if ( ! parentMenu.contains( event.target ) ) {
          menuButton.setAttribute( 'aria-expanded', false );
        }
      });
    });

    Array.prototype.forEach.call(topLevelMenuItems, topLevelMenuItem => {
      topLevelMenuItem.addEventListener('focus', () => {
        const openDropDown = primaryMenu.querySelector('[aria-expanded="true"]');
        if ( ! openDropDown ) {
          return;
        }
        openDropDown.setAttribute('aria-expanded', false);
      });
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
