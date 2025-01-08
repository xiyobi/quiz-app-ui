function test(){
    let errorMessage=document.getElementById("forTest"),
        email = document.getElementById("email"),
        password = document.getElementById("password");
    if (email.value === "" || password.value === "") {
        errorMessage.innerHTML = "Please enter your email and password";
        errorMessage.style.color="red";
    }
}