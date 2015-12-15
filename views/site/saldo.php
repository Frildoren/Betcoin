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
        <a class="btn-md btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Añadir
        </a>
    </div>
    
    <?php 
    
        foreach($metodos as $m) {
            echo Html::tag("div", "<b>Tarjeta</b> "
                     .Html::tag("span", $m, ['class'=>'label label-success']
                    )." ".Html::a(Html::tag("i", "", ['class' => "glyphicon glyphicon-pencil"]), ""),
            ['class' => 'metodos']);
        }
        
       /* echo Html::a(kartik\icons\Icon::show('paypal')."Paypal", ["https://www.paypal.com"], [
            'class' => 'btn-md btn btn-info'
        ])*/
        
    ?>
    
    <div class="header-saldo"> 
        <h1>Ingresar</h1>
    </div>    

</div>
