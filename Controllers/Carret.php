<?php
class Carret extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function getCartDetails() {
      
        $input = file_get_contents('php://input');
        $cart = json_decode($input, true)['cart'];

        // Verifique que el carret no sigui nul o buit
        if (!is_array($cart) || empty($cart)) {
            echo json_encode(['products' => [], 'total' => 0]);
            return;
        }

        $productDetails = [];
        $total = 0;

        // Recorre els productes del carret i recuperem els detalls
        foreach ($cart as $item) {
            $product = $this->model->selectProducto($item['id']);
            if ($product) {
                $product['quantity'] = $item['quantity'];
                $product['subtotal'] = $product['precio'] * $item['quantity'];
                $total += $product['subtotal'];
                $productDetails[] = $product;
            }
        }

        // Retorne la resposta amb els productes i el total
        $response = [
            'products' => $productDetails,
            'total' => $total
        ];

        echo json_encode($response);
    }
}

