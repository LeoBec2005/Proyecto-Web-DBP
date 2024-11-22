document.getElementById("btn__iniciar-cliente").addEventListener("click", function () {
    document.getElementById("formulario_cliente").style.display = "block";
    document.getElementById("formulario_empleado").style.display = "none";
});

document.getElementById("btn__iniciar-empleado").addEventListener("click", function () {
    document.getElementById("formulario_cliente").style.display = "none";
    document.getElementById("formulario_empleado").style.display = "block";
});

document.getElementById("btn__registrarse").addEventListener("click", function () {
    document.getElementsByClassName("formulario__register")[0].style.display = "block";
    document.getElementById("formulario_cliente").style.display = "none";
    document.getElementById("formulario_empleado").style.display = "none";
});
