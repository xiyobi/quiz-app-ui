function login(){
    let form=document.getElementById("login-form"),
        formData = new FormData(form);

    fetch('http://localhost:8080/api/login',
    {
        method:"Post",
            body: formData
    }).then(function (response){
        if (response.ok){
            return response.json();
        }
        return Promise.reject(response);
    }).then(function (data){
        localStorage.setItem('token',data.token);
        console.log(localStorage.getItem('token'));
    })
        .catch(function (error){
            console.error(error)
        });

}

function register(){
    let form=document.getElementById("register-form"),
        formData = new FormData(form);

    fetch('http://localhost:8080/api/register',
        {
            method:"Post",
            body: formData
        }).then(function (response){
        if (response.ok){
            return response.json();
        }
        return Promise.reject(response);
    }).then(function (data){
        localStorage.setItem('token',data.token);
        console.log(localStorage.getItem('token'));
    })
        .catch(function (error){
            console.error("error")
        });

}