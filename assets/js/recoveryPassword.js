
const inpuitEmail = document.getElementById("email");
const msg_warning = document.getElementById("msg_aviso");

function loadingSendEmail(){
    if(msg_warning.childNodes.length > 0 && inpuitEmail.value.length > 4){
        msg_warning.innerHTML = "Carregando...";
    }
}