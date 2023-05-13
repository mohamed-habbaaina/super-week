window.addEventListener('DOMContentLoaded', async () => {

const containerUsers = document.querySelector('.containerUsers');
let html ='';
let response = await fetch('users/json');
let data = await response.json();

html += ''

html += `
    <table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>`;

    data.forEach(item => {
        html += `
        <tr>
            <td>${item.first_name}</td>
            <td>${item.last_name}</td>
            <td>${item.email}</td>
        </tr>
        `;
    });


    html += `
        </tbody>
        </table>
    `;
    
    containerUsers.insertAdjacentHTML('beforeend', html);


})