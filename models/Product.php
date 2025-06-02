<?php


class Producto extends Conectar {
    //TODO; Extraer todos los datos de la bd
    public function getProducto() {
        $connectar = parent::Conexion();
        parent::setNames();

        $sql = "SELECT p.prod_id, p.cat_id, p.prod_nom, p.prod_moneda, p.prod_precio, c.cat_nom FROM tm_producto p INNER JOIN tm_categoria c ON p.cat_id = c.cat_id WHERE p.est = 1";
        $sql = $connectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //TODO; Funcion para extraer un producto especifico de la bd
    public function getProductById($productId) {
        $connectar = parent::Conexion();
        parent::setNames();

        $sql = "SELECT p.prod_id, p.cat_id, p.prod_nom, p.prod_moneda, p.prod_precio, c.cat_nom FROM tm_producto p INNER JOIN tm_categoria c ON p.cat_id = c.cat_id WHERE p.est = 1 AND p.prod_id=?";
        $sql = $connectar->prepare($sql);
        $sql->bindValue(1, $productId);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}