import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//funcionalidad para el botón de perfil de la página
//Selecciona los elementos
const userProfile = document.getElementById('user-profile');
const cajaPerfil = document.querySelector('.caja-perfil');

//Agrega el evento de click al perfil
userProfile.addEventListener('click', () => {
    //Alterna la visibilidad de la caja
    if (cajaPerfil.style.display === 'none' || cajaPerfil.style.display === '') {
        cajaPerfil.style.display = 'flex'; // Mostrar la caja
    } else {
        cajaPerfil.style.display = 'none'; // Ocultar la caja
    }
});

//Cerrar la caja si el usuario hace click fuera de ella
document.addEventListener('click', (event) => {
    if (!userProfile.contains(event.target) && !cajaPerfil.contains(event.target)) {
        cajaPerfil.style.display = 'none';
    }
});

