export default {
  init() {
    // JavaScript to be fired on the home page
    (function() {
      // Get all the <h2> headings
      const headings = document.querySelectorAll('main h3')

      Array.prototype.forEach.call(headings, heading => {
        // Give each <h3> a toggle button child
        heading.innerHTML = `
          <button class="is-style-textonly" aria-expanded="false">
            ${heading.textContent}
            <span class="icon"></span>
          </button>
        `

        // Function to create a node list
        // of the content between this <h2> and the next
        const getContent = (elem) => {
          let elems = []
          while (elem.nextElementSibling && elem.nextElementSibling.tagName !== 'H3') {
            elems.push(elem.nextElementSibling)
            elem = elem.nextElementSibling
          }

          // Delete the old versions of the content nodes
          elems.forEach((node) => {
            node.parentNode.removeChild(node)
          })

          return elems
        }

        // Assign the contents to be expanded/collapsed (array)
        let contents = getContent(heading)

        // Create a wrapper element for `contents` and hide it
        let wrapper = document.createElement('div')
        wrapper.hidden = true;

        // Add each element of `contents` to `wrapper`
        contents.forEach(node => {
          wrapper.appendChild(node)
        })

        // Add the wrapped content back into the DOM
        // after the heading
        heading.parentNode.insertBefore(wrapper, heading.nextElementSibling)

        // Assign the button
        let btn = heading.querySelector('button')

        btn.onclick = () => {
          // Cast the state as a boolean
          let expanded = btn.getAttribute('aria-expanded') === 'true' || false

          // Switch the state
          btn.setAttribute('aria-expanded', !expanded)
          // Switch the content's visibility
          if(!expanded) {
            wrapper.hidden = false;
          } else {
            wrapper.hidden = true;
          }
        }
      })
    })()
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
