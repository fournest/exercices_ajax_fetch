document.addEventListener('DOMContentLoaded', () => {
    const loadUsersButton = document.getElementById('loadUsers');
    const userList = document.getElementById('userList');

    loadUsersButton.addEventListener('click', () => {
        fetch('https://jsonplaceholder.typicode.com/users')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur de réseau ou de serveur.');
                }
                return response.json();
            })
            .then(users => {
                userList.innerHTML = ''; 
                
                users.forEach(user => {
                    const listItem = document.createElement('li');
                    listItem.textContent = user.name;
                    userList.appendChild(listItem);
                });
            })
            .catch(error => {
                console.error('Il y a eu un problème avec l\'opération fetch :', error);
                userList.innerHTML = '<li>Erreur lors du chargement des utilisateurs. Veuillez réessayer.</li>';
            });
    });
});

