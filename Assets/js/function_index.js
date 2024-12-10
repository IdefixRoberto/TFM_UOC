const baseURL = 'http://tfmuocecomerc.rf.gd/'

document.addEventListener('DOMContentLoaded', function() {
    const infoButtons = document.querySelectorAll('.btn-yellow');

    infoButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-producte');
            window.location.href = `${baseURL}DetallProducte/detallProducte/${productId}`;
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    updateCartCount();
    // Seleccione el boto de comprar
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            let productId = this.getAttribute('data-producte');
            addToCart(productId);
        });
    });

    //Capture el boto de la icona del carret i el dropdown(es el modal que es mostra al clicar la icona)

    const cartIcon = document.querySelector('.cart-icon');
    const cartDropdown = document.querySelector('.cart-dropdown');

    // Si faig click en la icona del carret es vorà el modal
    cartIcon.addEventListener('click', function() {
       
        cartDropdown.style.display = cartDropdown.style.display === 'none' ? 'block' : 'none';
        loadCartDetails();
    });

        document.addEventListener('click', function(event) {
            //  amaga el carret
            if (!cartIcon.contains(event.target) && !cartDropdown.contains(event.target)) {
                cartDropdown.style.display = 'none';
            }
        });

    // Funció per afegir un producte al carret
    function addToCart(productId) {
        let product = cart.find(item => item.id === productId);
        if (product) {
            product.quantity++;
        } else {
            cart.push({ id: productId, quantity: 1 });
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
    }

    // Actualitza el comptador del carret
    function updateCartCount() {
        let totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        document.querySelector('.cart-count').textContent = totalItems;
    }

    function loadCartDetails() {
        fetch(`${baseURL}Carret/getCartDetails`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ cart: cart })
        })
        .then(response => response.json())
        .then(data => {
            let cartItemsContainer = document.querySelector('.cart-items');
            let cartTotal = document.querySelector('.cart-total');
            cartItemsContainer.innerHTML = ''; // Neteja els productes anteriors
            let total = 0;
    
            data.products.forEach(product => {
                let subtotal = product.precio * product.quantity;
                total += subtotal;
    
                let li = document.createElement('li');
                li.innerHTML = `
                
                    <div class="d-flex w-35 justify-content-start align-items-start">
                        <span >
                            ${product.nomproducte} : 
                        </span>

                    </div>

                    <div class="ml-2 w-40 justify-content-end align-items-end text-end ">
                        <span >
                            ${product.quantity} x ${product.precio}€ = ${subtotal.toFixed(2)}€
                        </span>
                    </div>

                    <div class="ml-2 w-12  justify-content-end align-items-end text-end">
                            <span class="item-subtotal">${subtotal.toFixed(2)}€</span>
                    </div>

                    <div class="ml-1 w-25 justify-content-end align-items-center item-controls">
                            <button class="btn btn-sm btn-outline-primary increase-btn mx-2" data-producte="${product.idproducto}">+</button>
                            <button class="btn btn-sm btn-outline-danger decrease-btn" data-producte="${product.idproducto}">-</button>
                    </div>
                `;
                cartItemsContainer.appendChild(li);

            });
    
            // Actualitza el total
            cartTotal.textContent = total.toFixed(2);
    
            // Afegeix els esdeveniments per incrementar o disminuir la quantitat
            document.querySelectorAll('.increase-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let productId = this.getAttribute('data-producte');
                    updateProductQuantity(productId, 1);  // Incrementa la quantitat
                });
            });
    
            document.querySelectorAll('.decrease-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let productId = this.getAttribute('data-producte');
                    updateProductQuantity(productId, -1);  // Disminueix la quantitat
                });
            });
        })
        .catch(error => {
            console.error('Error carregant el carret:', error);
        });
    }
    
    // Funció per actualitzar la quantitat d'un producte al carret
    function updateProductQuantity(productId, change) {
        let product = cart.find(item => item.id === productId);
        if (product) {
            product.quantity += change;
    
            // Si la quantitat és 0 o menys, demanar confirmació abans d'eliminar el producte
            if (product.quantity <= 0) {
                // SweetAlert per confirmar l'eliminació
                Swal.fire({
                    title: 'Estàs segur?',
                    text: "Aquesta acció eliminarà el producte del carret!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, elimina-ho!',
                    cancelButtonText: 'Cancel·lar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si es confirma, elimina el producte del carret
                        cart = cart.filter(item => item.id !== productId);  // Elimina el amb id igual a productId filtrant
                        localStorage.setItem('cart', JSON.stringify(cart));
                        loadCartDetails();  
                        updateCartCount();  
    
                        Swal.fire(
                            'Eliminat!',
                            'El producte ha estat eliminat del carret.',
                            'success'
                        );
                    } else {
                        // Si es cancela, iguale la quantitat a 1
                        product.quantity = 1;
                        localStorage.setItem('cart', JSON.stringify(cart));
                        loadCartDetails();  
                        updateCartCount(); 
                    }
                });
            } else {
                // Si la quantitat és superior a 0, actualitce el carret
                localStorage.setItem('cart', JSON.stringify(cart));
                loadCartDetails();  
                updateCartCount(); 
            }
        }
    }
});

    
    function toggleFinalizeButton() {
        const finalizeButton = document.querySelector('.finalize-purchase-btn');

        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
        if (cart.length > 0) {
            finalizeButton.disabled = false;
            finalizeButton.classList.remove('btn-secondary');
            finalizeButton.classList.add('btn-primary');

            finalizeButton.addEventListener('click', function() {
                if (!finalizeButton.disabled) {
                    window.location.href = `${baseURL}pagament`;
                }
            });
        } else {
            finalizeButton.disabled = true;
            finalizeButton.classList.remove('btn-primary');
            finalizeButton.classList.add('btn-secondary');
        }
    }


document.addEventListener('DOMContentLoaded', function() {
    

    
    toggleFinalizeButton();

    
});

document.addEventListener('click', function() {
    toggleFinalizeButton()
});