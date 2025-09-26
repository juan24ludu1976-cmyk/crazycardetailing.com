const table = document.getElementById('miTabla');
const resizableColumns = table.querySelectorAll('.resizable');

let start = null;
let startX, startWidth;

function iniciarResize(e, column){
    start = column;
    startX = e.type.startWidth('touch')? e.touches[0].pageX:e.pageX;
    startWidth = column.offsetWidth;
    column.classList.add('resizing');
    e.preventDefault();
}

function moverResize(e){
    if(start){
        const pageX = e.type.startWidth('touch')? e.touches[0].pageX: e.pageX;
        const width = startWidth + (pageX - startX); start.style.width = `${width}px`;
    }
}

function finalizarResize(){
    if(start){
        start.classList.remove('resizing');
        start = null;
    }
}

resizableColumns.forEach(column => {
    const resizer = document.createElement('div');
    resizer.className = 'resizer';
    column.appendChild(resizer);

    //Eventos para mouse
   resizer.addEventListener('mousedown', e => iniciarResize(e, column));
   //Eventos para tactil
   resizer.addEventListener('touchststart', e => iniciarResize(e, column), {passive: false});
});

//Eventos globales para mouse
document.addEventListener('mousemove', moverResize);
document.addEventListener('mouseup', finalizarResize);

//Eventos globales para tactil
document.addEventListener('touchmove', moverResize, {passive: false});
document.addEventListener('touchend', finalizarResize);
    /*
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
});*/
