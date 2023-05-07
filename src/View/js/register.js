window.addEventListener('DOMContentLoaded', () => {

//******************* validation inputs ************* */
//****************************************************/ 

const formRegister = document.forms['formRegister'];
const email = document.forms['formRegister']['email'];
const firstName = document.forms['formRegister']['first_name'];
const lastName = document.forms['formRegister']['last_name'];
const password = document.forms['formRegister']['password'];
const coPass = document.forms['formRegister']['c_pass'];

const messageErr = document.querySelector('.messageErr');

//******************* Listener ******************** */
//****************************************************/ 

email.addEventListener('input', validEmail);
firstName.addEventListener('input', validFirstName);
lastName.addEventListener('input', validLastName);
password.addEventListener('input', validPassword);
coPass.addEventListener('input', validCoPass);


// *********************** Email *********************/
//****************************************************/ 

function validEmail()
{

    // Creation of the Regexp to validate the email
    let emailRegExp = /^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,}$/;

    //  test the email address
     let testEmail = emailRegExp.test(email.value); // return true ou false.

    //  Get the small tag: 'nextElementSibling'
    let small = email.nextElementSibling;

    // Displaying the email validation
    if(testEmail)
    {
        small.innerHTML = '';
        email.style.outlineColor = 'green'
        return true; // to use it in the form devalidation function => validForm.
    } else
    {
        small.innerHTML = 'Adresse Email Pas Valide (Carectère Valide: A-Z 0-9 _.-)';
        small.style.color = 'red';
        email.style.outlineColor = 'red'
        return false;
    }
}


})
