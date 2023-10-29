const btnMobile = document.getElementById('btn-mobile');

function toggleMenu(event) {
  if (event.type === 'touchstart') event.preventDefault();
  const nav = document.getElementById('nav');
  nav.classList.toggle('active');
  const active = nav.classList.contains('active');
  event.currentTarget.setAttribute('aria-expanded', active);
  if (active) {
    event.currentTarget.setAttribute('aria-label', 'Fechar Menu');
  } else {
    event.currentTarget.setAttribute('aria-label', 'Abrir Menu');
  }
}

btnMobile.addEventListener('click', toggleMenu);
btnMobile.addEventListener('touchstart', toggleMenu);

// Lightmode
function myFunction() {
  var element = document.body;
  element.classList.toggle("lightmode");
}

// Modal
function iniciaModal(modalID) {
  const modal = document.getElementById(modalID);
  if (modal) {
    modal.classList.add('mostrar');
    modal.addEventListener('click', (e) => {
      if (e.target.id == modalID || e.target.className == 'fechar') {
        modal.classList.remove('mostrar');
        e.stopPropagation(); // Impede a propagação do evento para o elemento modal
      }
    });
  }
}

const addCurta = document.querySelector('.btn-add');
addCurta.addEventListener('click', (e) => {
  e.stopPropagation(); // Impede a propagação do evento para o elemento modal
  iniciaModal('modal-curta');
});
