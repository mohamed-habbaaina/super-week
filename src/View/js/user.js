window.addEventListener('DOMContentLoaded', () => {

const formUser = document.forms['formUser'];
const user = document.forms['formUser']['user'];

const formBook = document.forms['formBook'];
const book = document.forms['formBook']['book'];

formUser.addEventListener('submit', (e) => {

    e.preventDefault();

    window.location = '/super-week/users/' + user.value
})

formBook.addEventListener('submit', (e) => {

    e.preventDefault();

    window.location = '/super-week/books/' + book.value
})



})