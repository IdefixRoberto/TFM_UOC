    <!-- Pàgina Inici -->
    <?php headerInici($data); ?>

    <main>

        <!-- Informació de l'usuari -->
        <div class="user-info w-50 m-auto mb-5">
            <h2>Informació de l'usuari</h2>
            <p>Nom: <?= $_SESSION['userData']['nom'] . ' ' . $_SESSION['userData']['cognoms']; ?></p>
            <p>Direcció: <?= $_SESSION['userData']['direccio']; ?></p>
            <p>Email: <?= $_SESSION['userData']['email']; ?></p>
            <p>Telèfon: <?= $_SESSION['userData']['telefono']; ?></p>
        </div >
        <div class="mt-5"></div>

        <!-- Llistat de la compra -->
        <div class="cart-details w-50  m-auto">
            <h2>La teua compra</h2>
            <ul class="cart-items" id="cart-items">
                <!-- Els elements del carret es carregaran aquí gràcies a JS -->
            </ul>
            <div class="total_Compra">Total: <span id="cart-total" class="cart-total">0</span>€</div>
        </div>

        <!-- Formulari de pagament -->
        <form id="payment-form"  class="mt-4 w-50 align-items-center justify-content-center m-auto padingtops" action="http://localhost/TFM/Pagament/registrarComanda" method="POST">
            <h1>Informació del pagament</h1>
            <div class="alert alert-dark" role="alert">
                <h2>Total: <span id="cart-total2" class="cart-total">0</span>€</h2>
            </div>

            <div class="form-group">
                <label for="payment-method">Selecciona el mètode de pagament:</label>
                <select name="payment-method" id="payment-method" class="form-control">
                    <option value="" disabled selected>Selecciona un mètode</option>
                    <option value="transferencia">Transferència</option>
                    <option value="tarjeta">Targeta</option>
                    <option value="bizzum">Bizum</option>
                </select>
            </div>

            <!-- Div per la transferència -->
            <div id="transferencia-info" class="payment-info" style="display: none;">
                <div class="alert alert-info">
                    Per completar la compra, fes una transferència al compte: <strong>ESXXXXXXXXXXXXXXX</strong>.
                </div>
            </div>

            <!-- Div per Bizum -->
            <div id="bizzum-info" class="payment-info" style="display: none;">
                <div class="form-group">
                    <label for="bizzum-phone">Número de telèfon (Bizum):</label>
                    <input type="text" id="bizzum-phone" class="form-control" required>
                </div>
            </div>

                    <!-- Div per la targeta -->
            <div id="tarjeta-info" class="payment-info" style="display: none;">
                <div class="form-group">
                    <label for="card-number">Número de targeta:</label>
                    <input type="text" id="card-number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="card-expiry">Data de caducitat:</label>
                    <input type="text" id="card-expiry" class="form-control" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label for="card-cvc">Codi de seguretat (CVC):</label>
                    <input type="text" id="card-cvc" class="form-control" required>
                </div>
            </div>

            

            <!-- Botó per finalitzar la compra -->
            <button type="submit" id="finalitzar_compra" class="btn btn-success mt-5 m-auto" disabled>Finalitzar compra</button>
        </form>
    </main>

    <!-- Peu de pàgina -->
    <?php footerInici($data); ?>