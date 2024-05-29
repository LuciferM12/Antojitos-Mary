const fechaActual = document.querySelector(".fecha-actual"),
      diasTag = document.querySelector(".dias"),
      prevSiguienteIcon = document.querySelectorAll(".iconos span"),
      fechaText = document.querySelector("#disabledtext"),
      fechaReserva = document.querySelector("#disabledInput");

let fecha = new Date(),
    aactual = fecha.getFullYear(),
    mactual = fecha.getMonth();

const meses = ["Enero", "Febrero", 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

const actualizarCalendario = () => {
    let primerDiadelMes = new Date(aactual, mactual, 1).getDay(),
        ultimoDiadelMes = new Date(aactual, mactual + 1, 0).getDate(),
        ultimoDiaSemanaDelMes = new Date(aactual, mactual, ultimoDiadelMes).getDay(),
        ultimoDiadelUltimoMes = new Date(aactual, mactual, 0).getDate();

    let liTag = '';
    for (let i = primerDiadelMes; i > 0; i--) {
        liTag += `<li class="inactivo">${ultimoDiadelUltimoMes - i + 1}</li>`;
    }
    for (let i = 1; i <= ultimoDiadelMes; i++) {
        let esHoy = i === fecha.getDate() && mactual === new Date().getMonth() && aactual === new Date().getFullYear() ? "activo" : "";
        liTag += `<li class="${esHoy}" data-dia="${i}" data-mes="${mactual}" data-ano="${aactual}">${i}</li>`;
    }
    for (let i = ultimoDiaSemanaDelMes; i < 6; i++) {
        liTag += `<li class="inactivo">${i - ultimoDiaSemanaDelMes + 1}</li>`;
    }
    
    fechaActual.innerText = `${meses[mactual]} ${aactual}`;
    diasTag.innerHTML = liTag;

    // Agregar evento de clic a los días
    const dias = diasTag.querySelectorAll("li");
    dias.forEach(dia => {
        dia.addEventListener("click", () => {
            if (!dia.classList.contains("inactivo")) {
                const diaSeleccionado = dia.getAttribute("data-dia");
                const mesSeleccionado = dia.getAttribute("data-mes");
                const anoSeleccionado = dia.getAttribute("data-ano");

                const fechaSeleccionada = new Date(anoSeleccionado, mesSeleccionado, diaSeleccionado);
                const hoy = new Date();

                if (fechaSeleccionada > hoy) {
                    // Mostrar el input y actualizar su valor en formato SQL
                    fechaReserva.style.display = 'block';
                    fechaReserva.value = `${anoSeleccionado}-${String(Number(mesSeleccionado) + 1).padStart(2, '0')}-${String(diaSeleccionado).padStart(2, '0')}`;
                    fechaText.style.display = 'block';
                } else {
                    console.log("El día seleccionado no es posterior al día actual.");
                }
            }
        });
    });
}

actualizarCalendario();

prevSiguienteIcon.forEach(icon => {
    icon.addEventListener("click", () => {
        mactual = icon.id === 'prev' ? mactual - 1 : mactual + 1;
        if (mactual < 0 || mactual > 11) {
            fecha = new Date(aactual, mactual, 1);
            aactual = fecha.getFullYear();
            mactual = fecha.getMonth();
        } else {
            fecha = new Date();
        }
        actualizarCalendario();
    });
});
