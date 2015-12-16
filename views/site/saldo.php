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
        <a class="btn-md btn btn-success" data-toggle="modal" data-target="#myModal">
            <i class="glyphicon glyphicon-plus"></i> Añadir
        </a>
    </div>
	
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<?= Html::beginForm("", "post", [
				'class'=>"money-form"
			]) ?>
			
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Nuevo método de pago</h4>
				</div>
				<div style="padding: 1em">
					<div class="input-group insert-money">
						<span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
					<input name="card" type="text" class="form-control" placeholder="Número de tarjeto">
					</div>
					
					<div class="input-group insert-money">
					<span class="input-group-addon">CDC</span>
					<input name="cdc" type="text" class="form-control" placeholder="CDC">
					</div>
				</div>
				<div class="modal-footer">
					<?= Html::a(kartik\icons\Icon::show('paypal')."Paypal", "https://www.paypal.com", [
						'class' => 'btn-md btn btn-default pull-left',
						'target' => '_blank',
					]) ?>
					<button type="submit" class="btn btn-success">Aceptar</button>
				</div>
			</div>
			
			<?= Html::endForm() ?>

		</div>
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
    
    <div style="height: 40px"></div>
    
    <div class="header-saldo"> 
        <h1>Ingresar</h1>
    </div>    
    
    
    <?= Html::beginForm("", "post", [
        'class'=>"money-form"
    ]) ?>
    
    <div class="input-group insert-money">
      <span class="input-group-addon">€</span>
      <input name="quantity" type="text" class="form-control" placeholder="Cantidad">
      <div class="input-group-btn">
          <select name="method" class="form-control" style="min-width: 200px">
              <option>Método de pago</option>
            <?php foreach ($metodos as $m) {
               echo Html::tag("option", $m);
            }
            ?>
        </select>
      </div><!-- /btn-group -->
    </div><!-- /input-group -->

    <input name="code" type="text" class="form-control promo-code" placeholder="Código promocional">

    <button class="btn-md btn btn-success" style="margin-top: 10px" type="submit">
        <i class="glyphicon glyphicon-arrow-up"></i>Ingresar        
    </button>
    
     <?= Html::endForm() ?>

</div>
