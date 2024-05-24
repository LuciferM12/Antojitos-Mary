const inicia_sesion_btn = document.querySelector("#inicia-sesion-btn");
const registrate_btn = document.querySelector("#registrate-btn");
const contenedor = document.querySelector(".contenedor");
const inicia_sesion_btn2 = document.querySelector("#IniciaSesion-btn2");
const registrate_btn2 = document.querySelector("#Registrate-btn2");

registrate_btn.addEventListener("click", () => {
    contenedor.classList.add("modo-registro");
});

inicia_sesion_btn.addEventListener("click", () => {
    contenedor.classList.remove("modo-registro");
});

registrate_btn2.addEventListener("click", () => {
    contenedor.classList.add("modo-registro2");
});

inicia_sesion_btn2.addEventListener("click", () => {
    contenedor.classList.remove("modo-registro2");
});