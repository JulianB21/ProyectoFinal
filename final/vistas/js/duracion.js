function duracion(sel) {
    if (sel == "Tecnico") {
        $("#nuevaDuracion").val("12 MESES");
        $("#nuevaDuracion").prop('readonly', true);
    } else if (sel == "Tecnologo") {
        $("#nuevaDuracion").val("24 MESES");
        $("#nuevaDuracion").prop('readonly', true);
    } else if (sel == "Complementario") {
        $("#nuevaDuracion").val("");
        $("#nuevaDuracion").prop('disabled', false);
    } else {
        $("#nuevaDuracion").val("");
        $("#nuevaDuracion").prop('disabled', true);
    }
}