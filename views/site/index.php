<?php

/* @var $this yii\web\View */

use miloschuman\highcharts\Highcharts;

use kartik\icons\Icon;
use kartik\icons\WhhgAsset;

Icon::map($this, Icon::WHHG);

$this->title = Yii::$app->params['name'];
?>
<div class="site-index">
    
    <a type="button" id="edit-profile" class="btn-md btn btn-info ">
        <i class="glyphicon glyphicon-pencil"></i> Editar 
    </a> 

    <div class="jumbotron">
        <img class="profile-pic" src="assets/profile_pic.jpg"/>

        <h2>John Cena</h2>
        
    <div class="saldo-div"> 
        <div>
            <h3><b>Saldo</b> <span id="total-money"><?= $saldo ?>€</span></h3>
            <h3><b>Saldo pendiente</b> <span id="pending-money"><?= $pendiente ?>€</span></h3>
        </div>
         
         <div>
             <?php 
             echo yii\helpers\Html::a(Icon::show('value-coins')."Gestionar saldo", ['/site/saldo'], [
                 'class' => "btn-lg btn btn-info money-button",
             ]);
             ?>
        </div>
		<div class="clearfix"></div>
    </div>
		<br>
	<?php
	
		echo Highcharts::widget([
			'options' => [
			   'title' => ['text' => 'Estadística de saldo'],
			   'xAxis' => [
				  'categories' => ['Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
			   ],
			   'yAxis' => [
				  'title' => ['text' => '€']
			   ],
			   'series' => [
					['name' => 'Saldo disponible', 'data' => [10, 25, 15, 90]],
					['name' => 'Saldo retenido', 'data' => [15, 10, 75, 90]],
			   ]
			]
		 ]);
	
	?>
    
</div>
