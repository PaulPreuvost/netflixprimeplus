<?php 
class Panier {
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
    }
    public function add ($product_id){
        if($this->isInPanier($product_id)){
            $_SESSION['panier'][$product_id]++;
        }else{
            $_SESSION['panier'][$product_id] = 1;
        }
    }
    public function del ($product_id){
        unset($_SESSION['panier'][$product_id]);
    }
    public function update($product_id, $quantity){
        if(isset($_SESSION['panier'][$product_id])){
            $_SESSION['panier'][$product_id] = $quantity;
        }
    }
    public function isInPanier($product_id){
        if(isset($_SESSION['panier'][$product_id])){
            return true;
        }else{
            return false;
        }
    }
}

?>