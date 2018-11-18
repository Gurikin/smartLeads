function validateInput () {
    var email = document.getElementById("email");

    var errMail = document.getElementById("errMail");

    var patternEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

    var resultEmail = patternEmail.test(email.value);

    if (email.value != '' && resultEmail == false) {
        errMail.innerHTML = "К сожалению email не валиден. Пожалуйста, проверте введенные даныне. Должно быть похоже на user@server.com";
    }

    if (email.value == '' || resultEmail == true) {
        errMail.innerHTML = '';
    }
}