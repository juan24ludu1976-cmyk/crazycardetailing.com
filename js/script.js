document.addEventListener('DOMContentLoaded', function() {
    const boton1 = document.getElementById('password');
    const boton2 = document.getElementById('newpassword');
    const localStorageKey = 'primerIngreso';

    // Verificar si el usuario ha ingresado antes
    if (localStorage.getItem(localStorageKey) === 'true') {
        // Si ya ingresó, muestra el Botón 2 y oculta el Botón 1
        boton1.style.display = 'none';
        boton2.style.display = 'block';
    } else {
        // Si es el primer ingreso, muestra el Botón 1
        boton1.style.display = 'block';
        boton2.style.display = 'none';
    }

    // Evento de clic para el Botón 1
    boton1.addEventListener('click', function() {
        // Oculta el Botón 1
        boton1.style.display = 'none';
        // Muestra el Botón 2
        boton2.style.display = 'block';
        // Guarda en localStorage que el usuario ya ingresó
        localStorage.setItem(localStorageKey, 'true');
    });

    // Opcional: Si el Botón 2 necesita una acción (por ejemplo, ir a otra página)
    boton2.addEventListener('click', function() {
        // Aquí puedes agregar la lógica para el Botón 2, como redirigir a otra página
        // Ejemplo: window.location.href = 'otra_pagina.html';
        alert('¡Has hecho clic en el segundo botón!');
    });
});