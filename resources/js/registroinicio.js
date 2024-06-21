
function showLine(country) {
    // Ocultar todas las líneas
    const lines = document.querySelectorAll("[id$='-line']");
    lines.forEach((line) => {
        line.classList.add("hidden", "-translate-x-full");
        line.classList.remove("translate-x-0");
    });

    // Mostrar la línea correspondiente y animarla
    const line = document.getElementById(`${country}-line`);
    line.classList.remove("hidden");
    setTimeout(() => {
        line.classList.remove("-translate-x-full");
        line.classList.add("translate-x-0");
    }, 10);
}

function check(id) {
    const checkboxes = ['hombre', 'mujer', 'no_identificado'];
    checkboxes.forEach((checkbox) => {
        if (checkbox !== id) {
            const checkboxElement = document.getElementById('check-' + checkbox);
            checkboxElement.classList.remove('bg-blue-700');
            checkboxElement.querySelector('i').classList.add('hidden'); // Ocultar ícono de chulito
        }
    });
    const checkboxElement = document.getElementById('check-' + id);
    checkboxElement.classList.toggle('bg-blue-700');
    checkboxElement.querySelector('i').classList.toggle('hidden'); // Mostrar/ocultar ícono de chulito
}

function hideInput() {
    document.getElementById('otro').classList.add('opacity-0');
    document.getElementById('otro').classList.add('pointer-events-none');
}

function showInput() {
    document.getElementById('otro').classList.remove('opacity-0');
    document.getElementById('otro').classList.remove('pointer-events-none');
}
