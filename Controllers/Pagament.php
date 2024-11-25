<?php
class Pagament extends Controllers {

    public function __construct(){

        session_start();
        parent::__construct();
       
       if(empty($_SESSION['login'])){
        header('Location: '.base_url().'login');
        }
        
        
    }
    
    public function processarPagament() {
        require 'vendor/autoload.php';
        \Stripe\Stripe::setApiKey('sk_test_51QAmyQDbz6lAu1J1FCrabZxIk46cD2Imn9Ew9OyfFpgieeKEQn6pdmtQNbka3D01zRW1XirEwmKd3mtCprEgpplw008lhSb1s7');

        $input = json_decode(file_get_contents('php://input'), true);
        $amount = $input['amount'];
        $paymentMethodId = $input['payment_method_id'];

        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'eur',
                'payment_method' => $paymentMethodId,
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

            echo json_encode(['clientSecret' => $paymentIntent->client_secret]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            echo json_encode(['error' => $e->getMessage()]);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function pagament() {
        
        $data['page_tag'] = "Pàgina de pagament";
        $data['page_title'] = "Pàgina de pagament";
        $data['page_name'] = "Pàgina de pagament";
        $data['page_functions_js'] = "funtions_pagamnt.js";
        $this->views->getViews($this, "pagament", $data);
    }

    

    


    public function processarComanda() {
        // Capturar les dades enviades des de JavaScript
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
    
        // Comprovar que 'cart' i 'paymentMethod' estan presents
        if (isset($data['cart']) && isset($data['paymentMethod'])) {
            $cart = $data['cart']; // Array amb els productes
            $tipopago = $data['paymentMethod']; // Mètode de pagament
            $nomComprador = $_SESSION['userData']['nom'];
            $cognomComprador = $_SESSION['userData']['cognoms'];
            $personaid = $_SESSION['userData']['id'];
            $fecha = date('Y-m-d H:i:s');
            $status = 2; // 1 = pendent, 2 = processant, 3 = enviat, 4 = lliurat
            $total_importe = 0;
    
            // Calcular el total de la comanda
            foreach ($cart as $item) {
                $idproducte = $item['id'];
                $quantitat = $item['quantity'];
    
                // Obtenir els detalls del producte des de la base de dades
                $producte = $this->model->selectProducto($idproducte);
    
                if ($producte) {
                    $preu = $producte['precio'];
                    // Calcular el subtotal per aquest producte
                    $subtotal = $quantitat * $preu;
                    // Sumar el subtotal al total de la comanda
                    $total_importe += $subtotal;
                }
            }
    
            // Inserir la comanda a la base de dades i capturar l'ID retornat
            $pedidoID = $this->model->inserirComanda(
                $personaid,
                $fecha,
                $total_importe,
                $tipopago,
                $status,
                $nomComprador,
                $cognomComprador
            );
            

            $total_importe = 0;
    
            
                // Inserir el detall de cada producte a la comanda
                foreach ($cart as $item) {
                    $idproducte = $item['id'];
                    $quantitat = $item['quantity'];
    
                    // Obtenir els detalls del producte des de la base de dades
                    $producte = $this->model->selectProducto($idproducte);
    
                    if ($producte) {
                        // Capturar les dades del producte
                        $nomproducte = $producte['nomproducte'];
                        $preu = $producte['precio'];
    
                        // Calcular el subtotal per aquest producte
                        $subtotal = $quantitat * $preu;
    
                        // Inserir el detall de la comanda a la base de dades
                        $this->model->inserirDetallComanda(
                            $idproducte,
                            $pedidoID,  // Utilitzar l'ID de la comanda capturat anteriorment
                            $preu,
                            $quantitat,
                            $nomproducte,
                            $subtotal
                        );
                    }
                }
                $_SESSION['pedido'] = $idproducte;
    
                // Retornar resposta JSON amb èxit i l'ID de la comanda
                echo json_encode(['success' => true, 'message' => 'Comanda processada correctament', 'idpedido' => $pedidoID]);
             
        } else {
            // Retornar resposta JSON amb error si les dades no són correctes
            echo json_encode(['success' => false, 'message' => 'Dades no rebudes correctament']);
        }
    }
    
    


}