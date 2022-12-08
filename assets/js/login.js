
const Input_password = document.getElementById("password");
const btn_eyePassword = document.getElementById("eyePassword");

function eyeClick(){
    let inputTypeIsPassword = Input_password.type == "password";

    if(inputTypeIsPassword){
        showPassword();
    } else {
        hidePassword();
    }
}

function showPassword(){
    Input_password.setAttribute("type", "text");
    btn_eyePassword.classList.remove("fa-eye");
    btn_eyePassword.classList.add("fa-eye-slash");

}

function hidePassword(){
    Input_password.setAttribute("type", "password");
    btn_eyePassword.classList.remove("fa-eye-slash");
    btn_eyePassword.classList.add("fa-eye");
}
