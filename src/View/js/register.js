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

// **************** first & last name ****************/
//****************************************************/ 


function validFirstName()
{

    // Creation of the Regexp to validate the first name:
    // Alphabetical letter, lower case, upper case, special letter (ç,é,,etc) and space.
    let nameRegExp = /^[a-zA-ZÀ-ÿ\s]+$/;

    let testname = nameRegExp.test(firstName.value); // @return true , false

    if(testname && firstName.value.length >= 2)
    {
    firstName.style.outlineColor = 'green'
        return true; // to use it in the form devalidation function => validForm.
    }
    else
    {
    firstName.style.outlineColor = 'red'
    return false;
    }
    
}
function validLastName()
{

    // Creation of the Regexp to validate the last name:
    // Alphabetical letter, lower case, upper case, special letter (ç,é,,etc) and space.
    let nameRegExp = /^[a-zA-ZÀ-ÿ\s]+$/;

    let testname = nameRegExp.test(lastName.value); // @return true , false

    if(testname && lastName.value.length >= 2)
    {
    lastName.style.outlineColor = 'green'
        return true; // to use it in the form devalidation function => validForm.
    }
    else
    {
    lastName.style.outlineColor = 'red'
    return false;
    }
    
}
// *********************** Password ********************/
// *****************************************************/ 

function validPassword()
{
    let messg;
    let valide = false;
    if(password.value.length < 4){
        messg = 'Password trop court, Minimum 4 caractères !'
    }
    else if(!/[A-Z]/.test(password.value))   // Check Upper case.
    {
        messg = 'Minimum 1 Majuscule !';
    }
    else if (!/[a-z]/.test(password.value))
    {
        messg = 'Minimum 1 Minuscule !';    // Check Lower case.
    }
    else if(!/[0-9]/.test(password.value))
    {
        messg = 'Minimum 1 Chiffre !';  // Check Number.
    }
    else{
        messg = 'Le Password est Valide';
        valide = true;
    }
    const small = password.nextElementSibling;
    if(valide){
        small.innerHTML = '';
        password.style.outlineColor = 'green';
        return true;
    }
    else{
        small.innerHTML = messg;
        small.style.color = 'red';
        password.style.outlineColor = 'red'
        return false;
    }
}

//****************** Confermation Password ***************/
// *******************************************************/ 


function validCoPass(){

    if(coPass.value === password.value){
        coPass.style.outlineColor = 'green'
        return true;
    }
    else{
        coPass.style.outlineColor = 'red'
        return false;
    }

}
//******************  Validation  ********************$$**/
// *******************************************************/ 


/**
 * @returns true if inputs valide
 */
function validForm() {
    if(validEmail() && validFirstName() && validLastName() && validPassword() && validCoPass()){
        return true;
    }
    else{
        return false;
    }
}

// ****************  Fetch and Create User ****************/
//*********************************************************/

formRegister.addEventListener('submit', async function(e)
{

    e.preventDefault();
    const formData = new FormData(this); // creation object Form.
    
    let res = await fetch('./src/Controller/userRegister.php', 
    {
        method: 'POST',
        headers:{
            'Accept': 'application/json',
        },
        body: formData
    });

    let response = await res.json();

    console.log(response);

    if(response == 'Created account !')
    {
        messageErr.innerText = response;
        messageErr.style.color = 'green';

        setTimeout(() => {
            window.location = './connect';
        }, 3000);
    } else
    {
        messageErr.innerText = response;
        messageErr.style.color = 'red';
    }

})
})
