import './bootstrap';

let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

function showItem(index) {
    items.forEach((item, i) => {
        item.style.opacity = (i === index) ? '1' : '0';
    });
}

document.getElementById('next').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % totalItems;
    showItem(currentIndex);
});

document.getElementById('prev').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + totalItems) % totalItems;
    showItem(currentIndex);
});

// Mostrar el primer ítem al cargar
showItem(currentIndex);
