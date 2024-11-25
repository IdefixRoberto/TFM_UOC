<?php

    class CercarModel extends Mysql
    {
        private $intIdUsuario;
        private $strUsuario;
        private $strPassword;
        private $strToken;

        public function __construct()
        {
            parent::__construct();
        }

        // Obtenir tots els productes amb el nom de la categoria
        public function selectProductos()
        {
            $sql = "SELECT p.idproducto,  p.categoriaid,  p.nomproducte, p.descripcion,  p.precio, p.stock, p.imagen,  p.status, p.reserva, p.fechaLanzamiento, p.outlet,  p.tempsDeJoc, p.jugadores, p.idioma, p.editorial, c.idcategoria, c.nombre, c.descripcion 
                    FROM productes p
                    INNER JOIN categoria c ON p.categoriaid = c.idcategoria";
            $request = $this->select_all($sql);
            return $request;
        }




        public function searchProductos($searchQuery)
        {
            $sql = "SELECT p.idproducto, p.categoriaid, p.nomproducte, p.descripcion, p.precio, p.stock, p.imagen, p.status, 
                           p.reserva, p.fechaLanzamiento, p.outlet, p.tempsDeJoc, p.jugadores, p.idioma, p.editorial, 
                           c.idcategoria, c.nombre AS categoria 
                    FROM productes p 
                    INNER JOIN categoria c ON p.categoriaid = c.idcategoria 
                    WHERE p.nomproducte LIKE :searchQuery OR p.descripcion LIKE :searchQuery";
        
            $arrData = $this->select_allCercador($sql, array(':searchQuery' => "%$searchQuery%"));
            return $arrData;
        }

        public function getRandomProducts($limit) {
            // Convertim $limit a un enter per evitar problemes de seguretat
            $limit = intval($limit);
        
            // Consulta SQL per obtenir productes aleatoris limitats a $limit
            $sql = "SELECT p.idproducto, p.nomproducte, p.descripcion, p.precio, p.imagen 
                    FROM productes p 
                    ORDER BY RAND() 
                    LIMIT $limit"; // Aquí pasem el valor del límit directament
        
            // Executem la consulta sense passar $limit com a paràmetre
            $arrData = $this->select_all($sql);
            return $arrData;
        }
        
        


        // Obtenir els detalls d'un producte
        public function selectProducto(int $idproducto)
        {
        
            $sql = "SELECT p.idproducto,  p.categoriaid,  p.nomproducte, p.descripcion,  p.precio, p.stock, p.imagen,  p.status, p.reserva, p.fechaLanzamiento, p.outlet,  p.tempsDeJoc, p.jugadores, p.idioma, p.editorial, c.idcategoria, c.nombre, c.descripcion 
            FROM productes p
            INNER JOIN categoria c ON p.categoriaid = c.idcategoria
            WHERE p.idproducto = $idproducto"; 

            $request = $this->select($sql);
            
            return $request;
        }


    }
?>