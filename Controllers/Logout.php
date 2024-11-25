<?php

class Logout
{
    public function __construct()
    {
        session_start();
        session_unset();
        session_destroy();
        
        // Amb el següent codi el que faig es esborrar les dades del localStore de la cistella i redirigir a la web inicial
        echo "<script>
                localStorage.removeItem('cart');
                window.location.href = '" . base_url() . "index';
              </script>";
        exit;
    }
}