window.addEventListener('DOMContentLoaded', async () => {

    const containerBooks = document.querySelector('.containerBooks');
    let html ='';
    let response = await fetch('books/json');
    let data = await response.json();
    
    html += ''
    
    html += `
        <table>
        <thead>
            <tr>
                <th>Author</th>
                <th>Title</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody>`;
    
        data.forEach(item => {
            html += `
            <tr>
                <td>${item.first_name} ${item.last_name}</td>
                <td>${item.title}</td>
                <td>${item.content}</td>
            </tr>
            `;
        });
    
    
        html += `
            </tbody>
            </table>
        `;
        
        containerBooks.insertAdjacentHTML('beforeend', html);
    
    
    })