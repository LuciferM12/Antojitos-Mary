const fechaActual = document.querySelector(".fecha-actual"),
diasTag = document.querySelector(".dias"),
prevSiguienteIcon = document.querySelectorAll(".iconos span");

let fecha = new Date(),
aactual = fecha.getFullYear(),
mactual = fecha.getMonth(),
dactual = fecha.getDay();

const meses = ["Enero", "Febrero", 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']

const actualizarCalendario = () => {
    let primerDiadelMes = new Date(aactual,mactual, 1).getDay(), //Obtiene el primer dia del mes
    ultimoDiadelMes = new Date(aactual,mactual+1,0).getDate(), //Obtiene el ultimo dia del mes
    ultimoDiasdelMes = new Date(aactual,mactual,ultimoDiadelMes).getDay(),
    ultimoDiadelUltimoMes = new Date(aactual,mactual,0).getDate(); //Obtiene el ultimo dia del ultimo mes
    let liTag = '';
    for (let i = primerDiadelMes; i > 0; i--) {
        liTag += `<li class = "inactivo">${ultimoDiadelUltimoMes - i + 1}</li>`;   
    }


    for (let i = 1; i <= ultimoDiadelMes; i++) {
        let esHoy = i === fecha.getDate() && mactual === new Date().getMonth() && aactual === new Date().getFullYear() ? "activo" : ""; 
        liTag += `<li class="${esHoy}">${i}</li>`; 
    }

    for (let i = ultimoDiasdelMes; i < 6; i++) {
        liTag += `<li class = "inactivo">${i - ultimoDiasdelMes + 1}</li>`;
        
    }
    
    
    fechaActual.innerText = `${meses[mactual]} ${aactual}`;
    diasTag.innerHTML = liTag;
}

actualizarCalendario()

prevSiguienteIcon.forEach(icon => {
    icon.addEventListener("click", () => {
        //si es el previo lo decrementa
        mactual = icon.id === 'prev' ? mactual - 1 : mactual + 1
        if(mactual < 0 || mactual > 11){
            fecha = new Date(aactual, mactual, new Date().getDate());
            aactual = fecha.getFullYear();
            mactual = fecha.getMonth();
        }
        else
        {
            fecha = new Date();
        }
        
        actualizarCalendario()
    })
});