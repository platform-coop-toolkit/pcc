export default {
  init() {
    // JavaScript to be fired on the single event page
    var SETTINGS = {
      navBarTravelling: false,
      navBarTravelDirection: '',
      navBarTravelDistance: 150,
    }

    const scrollPrevious = document.getElementById('scroll-previous');
    const scrollNext = document.getElementById('scroll-next');
    const ribbonNav = document.querySelector('.ribbon nav')
    const ribbonNavContents = ribbonNav.querySelector('ul');

    ribbonNav.setAttribute('data-overflowing', determineOverflow(ribbonNavContents, ribbonNav));

    // Handle the scroll of the horizontal container
    var last_known_scroll_position = 0;
    var ticking = false;

    function doSomething() {
      ribbonNav.setAttribute('data-overflowing', determineOverflow(ribbonNavContents, ribbonNav));
    }

    ribbonNav.addEventListener('scroll', function() {
        last_known_scroll_position = window.scrollY;
        if (!ticking) {
            window.requestAnimationFrame(function() {
                doSomething(last_known_scroll_position);
                ticking = false;
            });
        }
        ticking = true;
    });

    scrollPrevious.addEventListener('click', function() {
      // If in the middle of a move return
        if (SETTINGS.navBarTravelling === true) {
            return;
        }
        // If we have content overflowing both sides or on the left
        if (determineOverflow(ribbonNavContents, ribbonNav) === 'left' || determineOverflow(ribbonNavContents, ribbonNav) === 'both') {
            // Find how far this panel has been scrolled
            var availableScrollLeft = ribbonNav.scrollLeft;
            // If the space available is less than two lots of our desired distance, just move the whole amount
            // otherwise, move by the amount in the settings
            if (availableScrollLeft < SETTINGS.navBarTravelDistance * 2) {
                ribbonNavContents.style.transform = 'translateX(' + availableScrollLeft + 'px)';
            } else {
                ribbonNavContents.style.transform = 'translateX(' + SETTINGS.navBarTravelDistance + 'px)';
            }
            // We do want a transition (this is set in CSS) when moving so remove the class that would prevent that
            ribbonNavContents.classList.remove('pn-ProductNav_Contents-no-transition');
            // Update our settings
            SETTINGS.navBarTravelDirection = 'left';
            SETTINGS.navBarTravelling = true;
        }
        // Now update the attribute in the DOM
        ribbonNav.setAttribute('data-overflowing', determineOverflow(ribbonNavContents, ribbonNav));
    });

    scrollNext.addEventListener('click', function() {
      // If in the middle of a move return
      if (SETTINGS.navBarTravelling === true) {
          return;
      }
      // If we have content overflowing both sides or on the right
      if (determineOverflow(ribbonNavContents, ribbonNav) === 'right' || determineOverflow(ribbonNavContents, ribbonNav) === 'both') {
          // Get the right edge of the container and content
          var navBarRightEdge = ribbonNavContents.getBoundingClientRect().right;
          var navBarScrollerRightEdge = ribbonNav.getBoundingClientRect().right;
          // Now we know how much space we have available to scroll
          var availableScrollRight = Math.floor(navBarRightEdge - navBarScrollerRightEdge);
          // If the space available is less than two lots of our desired distance, just move the whole amount
          // otherwise, move by the amount in the settings
          if (availableScrollRight < SETTINGS.navBarTravelDistance * 2) {
              ribbonNavContents.style.transform = 'translateX(-' + availableScrollRight + 'px)';
          } else {
              ribbonNavContents.style.transform = 'translateX(-' + SETTINGS.navBarTravelDistance + 'px)';
          }
          // We do want a transition (this is set in CSS) when moving so remove the class that would prevent that
          ribbonNavContents.classList.remove('pn-ProductNav_Contents-no-transition');
          // Update our settings
          SETTINGS.navBarTravelDirection = 'right';
          SETTINGS.navBarTravelling = true;
      }
      // Now update the attribute in the DOM
      ribbonNav.setAttribute('data-overflowing', determineOverflow(ribbonNavContents, ribbonNav));
  });

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
