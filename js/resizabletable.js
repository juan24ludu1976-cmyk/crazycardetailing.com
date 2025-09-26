const table = document.getElementById('miTabla');
const resizableColumns = table.querySelectorAll('.resizable');

let start = null;
let startX, startWidth;

resizableColumns.forEach(column => {
    const resizer = document.createElement('div');
    resizer.className = 'resizer'; column.appendChild(resizer);

resizer.addEventListener('mousedown', (e) => {
        start = column;
        startX = e.pageX;
        startWidth = column.offsetWidth;
        column.classList.add('resizing');
        e.preventDefault(); //Evita seleccion de texto
    });
});

document.addEventListener('mousemove', (e) => {
    if(start){
        const width = startWidth + (e.pageX - startX);
        start.style.width = `${width}px`;
    }
});

document.addEventListener('mouseup', () => {
    if(start){
        start.classList.remove('resizing');
        start = null;
    }
});