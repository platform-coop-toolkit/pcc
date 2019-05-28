export default {
  init() {
    // JavaScript to be fired on the home page
    const personasList = document.getElementById('personas');
    const personas = personasList.querySelectorAll('a');
    const personasSubmit = document.querySelector('.personas--submit');
    let selectEl = document.createElement('select');
    selectEl.setAttribute('id', 'personas-select');
    selectEl.classList.add('personas--select');
    Array.prototype.forEach.call(personas, persona => {
      const personaUrl = persona.getAttribute('href');
      const personaHash = personaUrl.substring(personaUrl.indexOf('#') + 1);
      let optionEl = document.createElement('option');
      optionEl.innerText = persona.innerText;
      optionEl.setAttribute('value', personaHash);
      selectEl.appendChild(optionEl);
    });
    personasList.parentNode.insertBefore(selectEl, personasList.parentNode.firstChild);
    personasSubmit.hidden = false;
    personasList.hidden = true;
    personasSubmit.onclick = () => {
      let personaHash = selectEl.value;
      window.location.hash = personaHash;
    }
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
