// Funció per obtenir els detalls del carret del servidor i guardar-los en localStorage
// Capturar l'objecte cart de localStorage
document.addEventListener('DOMContentLoaded', function() {
    
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let cartjson = JSON.stringify(cart);
    
    

    // Capturar el mètode de pagament del select
    let paymentMethod = document.getElementById('payment-method').value;

       
});

document.addEventListener('click', function() {
    
     cart = JSON.parse(localStorage.getItem('cart')) || [];
     cartjson = JSON.stringify(cart);
    
    

    // Capturar el mètode de pagament del select
     paymentMethod = document.getElementById('payment-method').value;

   
    
});

const enviarComandaABaseDAdes = () => {
    document.addEventListener('click', function(event) {
        // Actualitzar el mètode de pagament i el carret cada vegada que es fa clic
        paymentMethod = document.getElementById('payment-method').value;
        cart = JSON.parse(localStorage.getItem('cart')) || [];
        cartjson = JSON.stringify(cart);
        
        // Mostrar els valors després de cada clic
        console.log('Actualització carjson:', cartjson);
        console.log('Actualització Mètode de pagament:', paymentMethod);

        // Enviar les dades al servidor
        fetch('http://localhost/TFM/pagament/processarComanda', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                cart: cart, 
                paymentMethod: paymentMethod 
            })
        })
        .then(response => response.text())
        .then(data => {
            console.log('Resposta del servidor: correcta');
        })
        .catch(error => {
            console.error('Error al processar la comanda:', error);
        });
    });
}




let cartTotalidCentimos = 0;

document.addEventListener('DOMContentLoaded', function() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    updateCartCount();
    loadCartDetails();  

    // Capturar el botón de la icona del carrito y el dropdown (es el modal que se muestra al hacer clic en la icona)
    const cartIcon = document.querySelector('.cart-icon');
    const cartDropdown = document.querySelector('.cart-dropdown');

    // Si faig clic en la icona del carrito es vora el llistat
    cartIcon.addEventListener('click', function() {
        cartDropdown.style.display = cartDropdown.style.display === 'none' ? 'block' : 'none';
        loadCartDetails();
    });

    document.addEventListener('click', function(event) {
        // Ocultar el carret
        if (!cartIcon.contains(event.target) && !cartDropdown.contains(event.target)) {
            cartDropdown.style.display = 'none';
        }
    });

    // Funció per a agregar un poducte al carret
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

    // Actualizar el contador del carret
    function updateCartCount() {
        let totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        document.querySelector('.cart-count').textContent = totalItems;
    }

    // Funció per a carregar els detalls del carret
    function loadCartDetails() {
        fetch('http://localhost/TFM/Carret/getCartDetails', {
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
            let cartItemsContainerPayment = document.querySelector('#cart-items');
            let cartTotalid = document.querySelector('#cart-total');
            let cartTotalid2 = document.querySelector('#cart-total2');
            
            
            cartItemsContainer.innerHTML = ''; 
            cartItemsContainerPayment.innerHTML = ''; 

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

                let liPayment = document.createElement('li');
                liPayment.classList.add('cart-item');
                liPayment.innerHTML = `
                    <div class="item-info">
                        <span class="item-name">${product.nomproducte}</span>
                        <span class="item-quantity">${product.quantity} x ${product.precio}€</span>
                    </div>
                    <div class="item-price">${subtotal.toFixed(2)}€</div>
                `;
                cartItemsContainerPayment.appendChild(liPayment);
            });
    
            // Actualize el total del carret en els seus diferents formats
            cartTotal.textContent = total.toFixed(2);
            cartTotalidCentimos  = parseInt(total.toFixed(2) * 100).toFixed(0);
            cartTotalid2.textContent = total.toFixed(2);
            cartTotalid.textContent = total.toFixed(2);
            
            // Agregar els events d'incrementar i disminuir les quantitats
            document.querySelectorAll('.increase-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let productId = this.getAttribute('data-producte');
                    updateProductQuantity(productId, 1);  // Incrementar 
                });
            });
    
            document.querySelectorAll('.decrease-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let productId = this.getAttribute('data-producte');
                    updateProductQuantity(productId, -1);  // Disminuir 
                });
            });
        })
        .catch(error => {
            console.error('Error carregant el carret:', error);
        });
    }
    
    // Función para actualitzar la quantitat dels productes
    function updateProductQuantity(productId, change) {
        let product = cart.find(item => item.id === productId);
        if (product) {
            product.quantity += change;
    
            // Si la quantitat es menor o igual a 0, elimine la fila del producte en el llistat
            if (product.quantity <= 0) {
                // SweetAlert per a confirmar la eliminació
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
                        // Si confirma, eliminar el producte del carret
                        cart = cart.filter(item => item.id !== productId);  // Eliminar el producte
                        localStorage.setItem('cart', JSON.stringify(cart));
                        loadCartDetails();  
                        updateCartCount();  
    
                        Swal.fire(
                            'Eliminat!',
                            'El producte ha estat eliminat del carret.',
                            'success'
                        );
                    } else {
                        // Si se cancela, igualar la quantitat  a 1
                        product.quantity = 1;
                        localStorage.setItem('cart', JSON.stringify(cart));
                        loadCartDetails();  
                        updateCartCount(); 
                    }
                });
            } else {
                // Si la cantidad es superior a 0, actualitzar el carret
                localStorage.setItem('cart', JSON.stringify(cart));
                loadCartDetails();  
                updateCartCount(); 
            }
        }
    }

    function toggleFinalizeButton() {
        const finalizeButton = document.querySelector('.finalize-purchase-btn');

        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
        if (cart.length > 0) {
            finalizeButton.disabled = false;
            finalizeButton.classList.remove('btn-secondary');
            finalizeButton.classList.add('btn-primary');

            finalizeButton.addEventListener('click', function() {
                if (!finalizeButton.disabled) {
                    window.location.href = '/TFM/pagament';
                }
            });
        } else {
            finalizeButton.disabled = true;
            finalizeButton.classList.remove('btn-primary');
            finalizeButton.classList.add('btn-secondary');
        }
    }

    toggleFinalizeButton();
    document.addEventListener('click', toggleFinalizeButton);

    finalitzar_compra.addEventListener('click', function(event) {
        event.preventDefault();

    if (selectedMethod === 'transferencia' || selectedMethod === 'bizzum') {
        localStorage.setItem('paymentMethod', selectedMethod);
        let bizzumPhone = document.getElementById('bizzum-phone').value;
        localStorage.setItem('bizzumPhone', bizzumPhone);

        // Executa la funcio per a registrar la conmanda  a la base de dades
       // Actualitzar el mètode de pagament i el carret cada vegada que es fa clic
       paymentMethod = document.getElementById('payment-method').value;
       cart = JSON.parse(localStorage.getItem('cart')) || [];
       cartjson = JSON.stringify(cart);
       

       // Enviar les dades al servidor
        fetch('http://localhost/TFM/pagament/processarComanda', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                cart: cart, // Array d'objectes
                paymentMethod: paymentMethod // Mètode de pagament
            })
        })
        .then(response => response.text())
        .then(data => {

            // Eliminar el prefix innecessari utilitzant una expressió regular
            const jsonString = data.match(/{.*}/)[0];

            
            const jsonData = JSON.parse(jsonString);

            // Accedir a la propietat idpedido
            const idpedido = jsonData.idpedido;


                localStorage.setItem('idpedido', idpedido);
            
                // Comanda registrada correctament
                Swal.fire({
                    title: 'Èxit!',
                    text: 'Comanda registrada correctament. Redirigint...',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false,
                    willClose: () => {
                        clearCart(); // Netejar el carret
                        window.location.href = '/TFM/pagamentCompletat'; // Redirigir a la pàgina de pagament completat
                    }
                });
        })
        .catch(error => {
                console.error('Error al processar la comanda:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Hi ha hagut un problema en registrar la comanda.',
                    icon: 'error',
                    confirmButtonText: 'D\'acord'
                });        });
   
   
    }


    
        else if (selectedMethod === 'tarjeta') {
            localStorage.setItem('paymentMethod', selectedMethod);
        
            // Cride el mètode per gestionar el pagament amb Stripe
            fetch('http://localhost/TFM/pagament/comandesCapturadades/'+selectedMethod, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    amount: cartTotalidCentimos, // El total ha d'estar en centims segons la informació de stripe
                    currency: 'eur',
                    payment_method_id: 'pm_card_visa', // capture la forma de pagament
                }),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json();
            })
            .then(async (data) => {
                console.log(data);
                //Comprovaré si hi ha notificacions d'error
                if (data.error) {
                    alert('Error: ' + data.error);
                    return;
                }
                //Si no hi ha errors, continuaré amb el pagament
                //El clientSecret en Stripe és una clau única associada a un objecte PaymentIntent
                // Informació de Stripe i diversos videos de youtube
                const clientSecret = data.clientSecret;
                const stripe = await loadStripe('pk_test_51QAmyQDbz6lAu1J1QD6SjFetiFkmOLAcctdKBDkHxVdG6YSyzcwdwBQpc813v1UuhNVBaB7c3E7ep01tlFni8X0D005zoLoX66');
        
                // Ara confirmaré que s'ha fet el pagament de forma correcta
                stripe.confirmCardPayment(clientSecret, {
                    payment_method: {
                        card: {
                            number: document.getElementById('card-number').value,
                            exp_month: document.getElementById('card-expiry').value.split('/')[0],
                            exp_year: document.getElementById('card-expiry').value.split('/')[1],
                            cvc: document.getElementById('card-cvc').value,
                        },
                    },
                })
                .then(function (result) {
                    //Si dona error mostraré l'error al client (millorar aquest apartat)
                    if (result.error) {
                        alert('Error amb el pagament: ' + result.error.message);
                    } else if (result.paymentIntent.status === 'succeeded') {
                        // Si el pagament es exitos ho registre en la meua base de dades
                        fetch('http://localhost/TFM/pagament/comandesCapturadades', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({ paymentMethod: 'tarjeta' })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error en la respuesta del servidor');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log(data);
                            if (data.success) {
                                // Una vegada regista la comanda, buidaré el carret i redirigiré a la pàgina de pagament completat
                                clearCart();
                                window.location.href = '/TFM/pagamentCompletat';
                            } else {
                                alert('Error al registrar la comanda: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error al registrar la comanda:', error);
                            alert('Error al registrar la comanda. Inténtalo de nuevo.');
                        });
                    }
                });
            })
            .catch((error) => {
                console.error('Error en la solicitud de pago:', error);
                alert('Error en la solicitud de pago. Por favor, inténtalo de nuevo.');
            });
        }

        else if (selectedMethod === 'tarjeta') {
            localStorage.setItem('paymentMethod', selectedMethod);
        
            // Cride el mètode per gestionar el pagament amb Stripe
            fetch('http://localhost/TFM/pagamentCompletat/comandesCapturadades', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    amount: cartTotalidCentimos, // El total ha d'estar en centims segons la informació de stripe
                    currency: 'eur',
                    payment_method_id: 'pm_card_visa', // capture la forma de pagament
                }),
            })
            .then(response => response.json())
            .then(async (data) => {
                //Comprovaré si hi ha notificacions d'error
                if (data.error) {
                    alert('Error: ' + data.error);
                    return;
                }
                //Si no hi ha errors, continuaré amb el pagament
                //El clientSecret en Stripe és una clau única associada a un objecte PaymentIntent
                // Informació de Stripe i diversos videos de youtube
                const clientSecret = data.clientSecret;
                const stripe = await loadStripe('pk_test_51QAmyQDbz6lAu1J1QD6SjFetiFkmOLAcctdKBDkHxVdG6YSyzcwdwBQpc813v1UuhNVBaB7c3E7ep01tlFni8X0D005zoLoX66');
        
                // Ara confirmaré que s'ha fet el pagament de forma correcta
                stripe.confirmCardPayment(clientSecret, {
                    payment_method: {
                        card: {
                            number: document.getElementById('card-number').value,
                            exp_month: document.getElementById('card-expiry').value.split('/')[0],
                            exp_year: document.getElementById('card-expiry').value.split('/')[1],
                            cvc: document.getElementById('card-cvc').value,
                        },
                    },
                })
                .then(function (result) {
                    //Si dona error mostraré l'error al client (millorar aquest apartat)
                    if (result.error) {
                        
                        alert('Error amb el pagament: ' + result.error.message);
                    } else if (result.paymentIntent.status === 'succeeded') {
                        // Si el pagament es exitos ho registre en la meua base de dades
                        fetch('http://localhost/TFM/pagament/comandesCapturadades', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({ paymentMethod: 'tarjeta' })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Una vegada regista la comanda, buidaré el carret i redirigiré a la pàgina de pagament completat
                                clearCart();
                                window.location.href = '/TFM/pagamentCompletat';
                            } else {
                                alert('Error al registrar la comanda.');
                            }
                        })
                        .catch(error => {
                            console.error('Error al registrar la comanda:', error);
                            alert('Error al registrar la comanda. Inténtalo de nuevo.');
                        });
                    }
                });
            })
            .catch((error) => {
                console.error('Error en la solicitud de pago:', error);
                alert('Error en la solicitud de pago. Por favor, inténtalo de nuevo.');
            });
        }
        







        
    });
    
    
    function clearCart() {
        cart = [];
        localStorage.removeItem('cart');
       
    }

});


//capture el valor de la forma de pagament

let selectedMethod = '';

document.addEventListener('input', function(event){
    selectedMethod = document.getElementById('payment-method').value;
    cardNumber = document.getElementById('card-number').value
    cardExpiry = document.getElementById('card-expiry').value  ;
    cardCvc = document.getElementById('card-cvc').value ;
});


document.getElementById('payment-method').addEventListener('change', function() {
    const selectedMethod = this.value;

    document.getElementById('transferencia-info').style.display = 'none';
    document.getElementById('tarjeta-info').style.display = 'none';
    document.getElementById('bizzum-info').style.display = 'none';

    document.getElementById('finalitzar_compra').disabled = true;

    if (selectedMethod === 'transferencia') {
        document.getElementById('transferencia-info').style.display = 'block';
        document.getElementById('finalitzar_compra').disabled = false;
    } 
    
    else if (selectedMethod === 'tarjeta') {
        document.getElementById('tarjeta-info').style.display = 'block';
        document.getElementById('finalitzar_compra').disabled = false;
        
        

    } else if (selectedMethod === 'bizzum') {
        document.getElementById('bizzum-info').style.display = 'block';

        // Capture el camp de número de Bizum
        const bizumInput = document.getElementById('bizzum-phone');

        // Validar el número de Bizum amb una expresió regular
        bizumInput.addEventListener('input', function() {
            const bizumRegex = /^\+34 \d{3} \d{3} \d{3}$/; 
            const bizumNumber = bizumInput.value.trim();

            // Habilitar el botó  sols si el telefon es correcte
            if (bizumRegex.test(bizumNumber)) {
                document.getElementById('finalitzar_compra').disabled = false;
            } else {
                document.getElementById('finalitzar_compra').disabled = true;
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const bizzumInput = document.getElementById('bizzum-phone');

    bizzumInput.addEventListener('input', function(e) {
        let value = bizzumInput.value.replace(/\D/g, '');  // Elimina tot el que no sigui dígit

        // Afegeix el prefix +34 si no està present
        if (!value.startsWith('34')) {
            value = '34' + value;
        }

        // Format de telèfon: +34 NNN NNN NNN
        if (value.length > 2) {
            value = '+34 ' + value.slice(2, 5) + ' ' + value.slice(5, 8) + ' ' + value.slice(8, 11);
        }

        // Actualitza el valor formatat en l'input
        bizzumInput.value = value;
    });
});







