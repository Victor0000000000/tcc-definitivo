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

//lightmode
function myFunction() {
  var element = document.body;
  element.classList.toggle("lightmode");
}

//MODAL 
function iniciaModal(modalID) {
  const modal = document.getElementById(modalID)
  if(modal) {
    modal.classList.add('mostrar');
      modal;addEventListener('click', (e) => {
      if(e.target.id == modalID || e.target.className == 'fechar') {
        modal.classList.remove('mostrar');
        
      }
    });
  }
}

const addCurta = document.querySelector('.btn-add')
addCurta.addEventListener('click', () => iniciaModal('modal-curta'));

