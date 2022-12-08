
const msg_warning = document.getElementById("msg_aviso");
const inputName = document.getElementById("name");
const inputEmail = document.getElementById("email");
const inputPassword = document.getElementById("password");
const inputPassword_comparativo = document.getElementById("password_comparativo");


function loadingRegisterUser(){
    if(msg_warning.childNodes.length > 0 && 
        inputName.value.length > 1 &&
        inputEmail.value.length > 4 &&
        inputPassword.value.length > 1 &&
        inputPassword_comparativo.value.length > 1){
        msg_warning.innerHTML = "Carregando...";
    }
}