<!-- Pàgina Inici -->
<?php headerInici($data); ?>


    <main class="container py-5">
        <h1 class="text-center mb-4">Contacte</h1>
        <form id="contact-form" class="p-4 border rounded shadow">
            <!-- Select per tipus de consulta -->
            <div class="mb-3">
            <label for="consulta" class="form-label">Tipus de consulta</label>
            <select id="consulta" class="form-select" required>
                <option value="" disabled selected>Selecciona una opció</option>
                <option value="comandes">Comandes realitzades</option>
                <option value="producte">Dubtes amb un producte</option>
                <option value="proteccio">Llei de protecció de dades</option>
                <option value="altres">Altres</option>
            </select>
            </div>

            <!-- Input per a text -->
            <div class="mb-3">
            <label for="missatge" class="form-label">Missatge</label>
            <textarea id="missatge" class="form-control" rows="4" placeholder="Escriu el teu missatge ací" required></textarea>
            </div>

            <!-- Botó d'enviar -->
            <div class="text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

    
    </main>

<!-- Peu de pàgina -->
<?php footerInici($data); ?>