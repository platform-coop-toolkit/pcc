export default {
  init() {
    // JavaScript to be fired on the single event page

    let SETTINGS = {
      navBarTravelling: false,
      navBarTravelDirection: '',
      navBarTravelDistance: 60,
    }

    const scrollPrevious = document.getElementById('scroll-previous');
    const scrollNext = document.getElementById('scroll-next');
    const ribbonNav = document.querySelector('.ribbon nav')
    const ribbonNavContents = ribbonNav.querySelector('ul');
    const ribbon = document.querySelector('.ribbon');
    const sticky = ribbon.offsetTop;

    ribbonNav.setAttribute('data-overflowing', determineOverflow(ribbonNavContents, ribbonNav));

    // Handle the scroll of the horizontal container.
    let ticking = false;

    function updateOverflow() {
      ribbonNav.setAttribute('data-overflowing', determineOverflow(ribbonNavContents, ribbonNav));
    }

    window.addEventListener('scroll', function() {
      if (!ticking) {
        window.requestAnimationFrame(function() {
          if (window.pageYOffset > sticky) {
            ribbon.classList.add('sticky');
          } else {
            ribbon.classList.remove('sticky');
          }
          ticking = false;
        });
      }
      ticking = true;
    });

    ribbonNav.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(function() {
              updateOverflow();
              ticking = false;
            });
        }
        ticking = true;
    });

    scrollPrevious.addEventListener('click', function() {
        // If in the middle of a scroll, bail.
        if (SETTINGS.navBarTravelling === true) {
          return;
        }

        // If we have content overflowing both sides or on the left, handle scroll.
        if (determineOverflow(ribbonNavContents, ribbonNav) === 'left' || determineOverflow(ribbonNavContents, ribbonNav) === 'both') {
          // Find how far the ribbon has been scrolled.
          let availableScrollLeft = ribbonNav.scrollLeft;

          // If the space available is less than two units of our desired distance, move the full distance.
          // Otherwise, move the distance in the settings.
          if (availableScrollLeft < SETTINGS.navBarTravelDistance * 2) {
            ribbonNavContents.style.transform = 'translateX(' + availableScrollLeft + 'px)';
          } else {
            ribbonNavContents.style.transform = 'translateX(' + SETTINGS.navBarTravelDistance + 'px)';
          }

          // When moving, remove the class that blocks CSS transitions.
          ribbonNavContents.classList.remove('no-transition');

          // Update our settings.
          SETTINGS.navBarTravelDirection = 'left';
          SETTINGS.navBarTravelling = true;
        }

        // Now update the attribute in the DOM
        ribbonNav.setAttribute('data-overflowing', determineOverflow(ribbonNavContents, ribbonNav));
    });

    scrollNext.addEventListener('click', function() {
      // If in the middle of a scroll, bail.
      if (SETTINGS.navBarTravelling === true) {
        return;
      }
      // If we have content overflowing both sides or on the right
      if (determineOverflow(ribbonNavContents, ribbonNav) === 'right' || determineOverflow(ribbonNavContents, ribbonNav) === 'both') {
        // Get the right edge of the container and content
        let navBarRightEdge = ribbonNavContents.getBoundingClientRect().right;
        let navBarScrollerRightEdge = ribbonNav.getBoundingClientRect().right;

        // Now we know how much space we have available to scroll
        let availableScrollRight = Math.floor(navBarRightEdge - navBarScrollerRightEdge);
        // If the space available is less than two lots of our desired distance, just move the whole amount
        // otherwise, move by the amount in the settings
        if (availableScrollRight < SETTINGS.navBarTravelDistance * 2) {
            ribbonNavContents.style.transform = 'translateX(-' + availableScrollRight + 'px)';
        } else {
            ribbonNavContents.style.transform = 'translateX(-' + SETTINGS.navBarTravelDistance + 'px)';
        }
        // We do want a transition (this is set in CSS) when moving so remove the class that would prevent that
        ribbonNavContents.classList.remove('no-transition');
        // Update our settings
        SETTINGS.navBarTravelDirection = 'right';
        SETTINGS.navBarTravelling = true;
      }
      // Now update the attribute in the DOM
      ribbonNav.setAttribute('data-overflowing', determineOverflow(ribbonNavContents, ribbonNav));
  });

  ribbonNavContents.addEventListener(
    'transitionend',
    function() {
        // get the value of the transform, apply that to the current scroll position (so get the scroll pos first) and then remove the transform
        var styleOfTransform = window.getComputedStyle(ribbonNavContents, null);
        var tr = styleOfTransform.getPropertyValue('-webkit-transform') || styleOfTransform.getPropertyValue('transform');
        // If there is no transition we want to default to 0 and not null
        var amount = Math.abs(parseInt(tr.split(',')[4]) || 0);
        ribbonNavContents.style.transform = 'none';
        ribbonNavContents.classList.add('no-transition');
        // Now lets set the scroll position
        if (SETTINGS.navBarTravelDirection === 'left') {
          ribbonNav.scrollLeft = ribbonNav.scrollLeft - amount;
        } else {
          ribbonNav.scrollLeft = ribbonNav.scrollLeft + amount;
        }
        SETTINGS.navBarTravelling = false;
    },
    false
);

  function determineOverflow(content, container) {
    var containerMetrics = container.getBoundingClientRect();
    var containerMetricsRight = Math.floor(containerMetrics.right);
    var containerMetricsLeft = Math.floor(containerMetrics.left);
    var contentMetrics = content.getBoundingClientRect();
    var contentMetricsRight = Math.floor(contentMetrics.right);
    var contentMetricsLeft = Math.floor(contentMetrics.left);
    if (containerMetricsLeft > contentMetricsLeft && containerMetricsRight < contentMetricsRight) {
        return 'both';
    } else if (contentMetricsLeft < containerMetricsLeft) {
        return 'left';
    } else if (contentMetricsRight > containerMetricsRight) {
        return 'right';
    } else {
        return 'none';
    }
  }
  },
  finalize() {
    // JavaScript to be fired on the single event page, after the init JS
  },
};
