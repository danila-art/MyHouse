let nameClient = document.getElementById('nameClient')
let numberFhone = document.getElementById('numberFhone')
let password = document.getElementById('password')
let email = document.getElementById('email')
let message = document.getElementById('message')
let formSubmitElement = document.getElementById('formSubmit')



function validForm(e) {
    if (nameClient.value == "") {
        // alert("Вы не ввели имя, это обязательно.")
        nameClient.nextElementSibling.style.display = "block"
        nameClient.addEventListener('click', () => {
            nameClient.nextElementSibling.style.display = "none"
        })
        return false;
    } else if (numberFhone.value == "") {
        // alert("Вы не ввели номер телефона, это обязательно.")
        numberFhone.nextElementSibling.style.display = "block"
        numberFhone.addEventListener('click', () => {
            numberFhone.nextElementSibling.style.display = "none"
        })
        return false;
    } else if (password.value == "") {
        password.nextElementSibling.style.display = "block"
        password.addEventListener('click', () => {
            password.nextElementSibling.style.display = "none"
        })
        return false;
    } else {
        return true;
    }

}