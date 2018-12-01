<?php require_once '_header.php';
  $json=array('error' => true);
    if(isset($_GET['id_prod']))
      {
         $product=$DB->query('SELECT * FROM produit WHERE id_prod=:id',array('id'=>$_GET['id_prod']));
         if(empty($product))
         	 $json['message']="Ce produit n existe pas";
         else
         {
          $qty=intval($product[0]->quantity);
            if($qty > 5){
            if($panier->add($product[0]->id_prod))
               {$nbr=$panier->count();
               $json['nbr']=$nbr;
              $json['error'] =false;
              $json['message']="Le produit a bien ete ajoute a votre panier";}
              else
                $json['message']="n";
          }}
      } 
    else
        $json['message']="Vous avez pas selectionne de produit e ajouter au panier";
     echo json_encode($json);
?>