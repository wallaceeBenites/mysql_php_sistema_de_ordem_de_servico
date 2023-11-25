





var capitar1 = false
var capitar2 = false


window.onload = function chamar() {


    if (capitar1) {
        document.getElementById("tabela_categoria").style.display = "block";
    } else {
        document.getElementById("tabela_categoria").style.display = "none";
    }

    if (capitar2) {
        document.getElementById("tabela_prioridade").style.display = "block";
    } else {
        document.getElementById("tabela_prioridade").style.display = "none";
    }






    if (capitar1) {
        document.getElementById("aparece1").style.display = "none";
    } else {
        document.getElementById("aparece1").style.display = "block";
    }

    if (capitar2) {
        document.getElementById("aparece2").style.display = "none";
    } else {
        document.getElementById("aparece2").style.display = "block";
    }
}



