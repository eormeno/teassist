import './bootstrap';

let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

// Función para mostrar el elemento actual
function showItem(index) {
    items.forEach((item, i) => {
        item.style.opacity = (i === index) ? '1' : '0';
    });
}

// Función para ir al siguiente elemento
function nextItem() {
    currentIndex = (currentIndex + 1) % totalItems;
    showItem(currentIndex);
}

// Función para ir al elemento anterior
function prevItem() {
    currentIndex = (currentIndex - 1 + totalItems) % totalItems;
    showItem(currentIndex);
}

// Configura el avance automático cada 4 segundos
const autoAdvance = setInterval(nextItem, 4000);  // Cambia el intervalo según prefieras

// Manejo de botones de navegación manual
document.getElementById('next').addEventListener('click', () => {
    clearInterval(autoAdvance);  // Detiene el avance automático al hacer clic
    nextItem();
});
document.getElementById('prev').addEventListener('click', () => {
    clearInterval(autoAdvance);  // Detiene el avance automático al hacer clic
    prevItem();
});


// Mostrar el primer item al cargar
showItem(currentIndex)
