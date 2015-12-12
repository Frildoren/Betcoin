<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->params['name'];
?>
<div class="site-index">
    
    <button type="button" id="edit-profile" class="btn-md btn btn-info ">
        <span class="glyphicon glyphicon-pencil"></span> Editar 
    </button> 

    <div class="jumbotron">
        <img class="profile-pic" src="assets/profile_pic.jpg"/>
        
        <h2>John Cena</h2>
        
    </div>
    
    <h3><b>Saldo</b> <span id="total-money">0€</span></h3>
    <h3><b>Saldo pendiente</b> <span id="pending-money">0€</span></h3>
    
</div>
