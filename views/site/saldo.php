<?php

/* @var $this yii\web\View */

use yii\helpers\Html; 

$this->title = 'Gestionar saldo';

?>
<div class="site-saldo">
    <div class="header-saldo"><h1><?= Html::encode($this->title) ?></h1>
        <a class="btn-md btn btn-success">
                <i class="glyphicon glyphicon-arrow-down"></i>Retirar        
        </a>
    </div>
    <br>
    <table>
        <tr>
            <td>Saldo actual</td>
            <td><?=$saldo?> €</td>
        </tr>
        <tr>
            <td>Saldo pendiente</td>
            <td><?=$pendiente?> €</td>
        </tr>
        
        <tr>
            <td>Total</td>
            <td><?=$saldo + $pendiente?> €</td>
        </tr>
    </table>

    <div style="height: 40px"></div>

    <div class="header-saldo"> 
        <h1>Método de pago</h1>
    </div>
    
    
    
    <div class="header-saldo"> 
        <h1>Ingresar</h1>
    </div>    

</div>
