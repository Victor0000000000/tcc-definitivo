/*nav-bar*/ 
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

//modais 

//modal modificar user

function iniciaModal(modalID) {
const modal = document.getElementById(modalID);
  if(modal) {
    modal.classList.add('mostrar');
      modal.addEventListener('click', (e) => {
        if(e.target.id == modalID || e.target.className == 'fechar') {
         modal.classList.remove('mostrar');
         
      }
    });
  }
}

const logo = document.querySelector('.card-perfil #editaNome');
logo.addEventListener('click', () => iniciaModal('modal-1'));

//modal modificar Email

function inicialModal2(modalID2) {
  const modal2 = document.getElementById(modalID2);
  if(modal2) {
    modal2.classList.add('mostrar');
      modal2.addEventListener('click', (e) => {
        if(e.target.id == modalID2 || e.target.className == 'fechar') {
          modal2.classList.remove('mostrar');
        }
      });
  }
}

const btn2 = document.querySelector('.card-perfil #editarEmail');
btn2.addEventListener('click', () => inicialModal2('modal-2'));

//modal modificar senha

function iniciaModal3(modalID3) {
  const modal3 = document.getElementById(modalID3);
  if(modal3) {
    modal3.classList.add('mostrar');
      modal3.addEventListener('click', (e) => {
        if(e.target.id == modalID3 || e.target.className == 'fechar'){
          modal3.classList.remove('mostrar');
        }
      });
  }
}

const btn3 = document.querySelector('.card-perfil #editarSenha');
btn3.addEventListener('click', () => iniciaModal3('modal-3'));