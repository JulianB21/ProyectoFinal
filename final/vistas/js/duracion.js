function duracion(sel) {
    debugger;
    var dur = document.getElementsByName("nuevaDuracion");
    if (sel == "Tecnico") {
        dur.value = "12 Meses";
        dur.disabled = true;
    } else if (sel == "Tecnologo") {
        dur.value = "24 Meses";
        dur.disabled = true;
    } else if (sel == "Complementario") {
        dur.value = "";
        dur.disabled = false;
    } else {
        dur.value = "";
        dur.disabled = true;
    }
}