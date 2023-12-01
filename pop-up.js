const Overlay = document.querySelector('.overlay');
const btnadd = document.querySelector('.add-description');

btnadd.addEventListener('click', ()=> {
Overlay.classList.add('active-edit-popup');
});