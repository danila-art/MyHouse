
if (document.getElementById('close_button') != '') {
    let closeButton = document.getElementById('close_button');
    console.log(closeButton)
    let module = document.getElementById('module');
    let buttonAplication = document.getElementById('buttonAplication')
    buttonAplication.addEventListener('click', () => {
        module.style.display = "flex";
        closeButton.addEventListener('click', () => {
            module.style.display = "none";
        })
    })

}
// else if () {

// }


function validAuth(e) {
    if (document.getElementById('auth_number').value == '') {
        let authNumber = document.getElementById('auth_number');
        authNumber.nextElementSibling.style.display = "block"
        authNumber.addEventListener('click', () => {
            authNumber.nextElementSibling.style.display = 'none';
        })
        return false;
    } else if (document.getElementById('auth_pass').value == '') {
        let authPass = document.getElementById('auth_pass');
        authPass.nextElementSibling.style.display = "block"
        authPass.addEventListener('click', () => {
            authPass.nextElementSibling.style.display = 'none';
        })
        return false;
    } else {
        return true;
    }
}

if (document.getElementById('closeButtonMyAplictation')) {

    let closeButtonMyAplictation = document.getElementById('closeButtonMyAplictation')

    closeButtonMyAplictation.addEventListener('click', () => {
        let module = document.getElementById('module');
        module.style.display = 'none';
    })
}