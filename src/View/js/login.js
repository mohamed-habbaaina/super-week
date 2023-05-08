window.addEventListener('DOMContentLoaded', () =>{

const formLogin = document.forms['formLogin'];
const email = document.forms['formLogin']['email']
const password = document.forms['formLogin']['password']
const messageErr = document.querySelector('.messageErr');

formLogin.addEventListener('submit', async function(e){
    e.preventDefault();
    // console.log(email.value, password.value);

    const formData = new FormData(this);

    let res = await fetch('./src/Controller/userLogin.php', 
    {
        method: 'POST',
        headers:{
            'Accept': 'application/json',
        },
        body: formData
    });

    let response = await res.json();

    if(response === 'Connected !')
    {
        messageErr.innerText = response;
        messageErr.style.color = 'green';

        setTimeout(() => {
            window.location = './';
        }, 2000);
    } else
    {
        messageErr.innerText = response;
        messageErr.style.color = 'red';
    }
})


})