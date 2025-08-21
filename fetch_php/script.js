document.addEventListener('DOMContentLoaded', () => {
    const loadProductsButton = document.getElementById('loadProducts');
    const productList = document.getElementById('productList');

    loadProductsButton.addEventListener('click', () => {
        fetch('products.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur de réseau ou de serveur.');
                }
                return response.json();
            })
            .then(products => {
                productList.innerHTML = ''; 
                
                products.forEach(product => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${product.title} - ${product.content}`;
                    productList.appendChild(listItem);
                });
            })
            .catch(error => {
                console.error('Il y a eu un problème avec l\'opération fetch :', error);
                productList.innerHTML = '<li>Erreur lors du chargement des produits. Veuillez réessayer.</li>';
            });
    });
});

