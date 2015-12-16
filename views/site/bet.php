<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = "$a vs $b";


echo Html::beginForm('', 'post', ["class"=>"site-bet"]);

echo Html::tag('h3', $this->title);
echo Html::tag('div', 
		Html::tag('div', '', ['class'=>'col-md-1'])
		.Html::tag('div', Html::tag('h5',$a), ['class'=>'col-md-6'])
		.Html::tag('div',  Html::tag('h5', "Ratio: ".rand(1,1000)/100), ['class'=>'col-md-2'])
		.Html::tag('div', '<div class="input-group">
			<input name="quantity[a]" type="text" class="form-control" placeholder="Cantidad" aria-describedby="basic-addon2">
			<span class="input-group-addon" id="basic-addon2">€</span>
		  </div>', ['class'=>'col-md-3'])
	, ['class'=>'row row-bet', 'style'=>'background-color:#F9F9F9']);

echo Html::tag('div', 
		Html::tag('div', '', ['class'=>'col-md-1'])
		.Html::tag('div', Html::tag('h5',' Empate'), ['class'=>'col-md-6'])
		.Html::tag('div',  Html::tag('h5',"Ratio: ".rand(1,1000)/100), ['class'=>'col-md-2'])
		.Html::tag('div', '<div class="input-group">
			<input name="quantity[e]" type="text" class="form-control" placeholder="Cantidad" aria-describedby="basic-addon2">
			<span class="input-group-addon" id="basic-addon2">€</span>
		  </div>', ['class'=>'col-md-3'])
	, ['class'=>'row row-bet']);

echo Html::tag('div', 
		Html::tag('div', '', ['class'=>'col-md-1'])
		.Html::tag('div', Html::tag('h5',$b), ['class'=>'col-md-6'])
		.Html::tag('div',  Html::tag('h5', "Ratio: ".rand(1,1000)/100), ['class'=>'col-md-2'])
		.Html::tag('div', '<div class="input-group">
			<input name="quantity[b]" type="text" class="form-control" placeholder="Cantidad" aria-describedby="basic-addon2">
			<span class="input-group-addon" id="basic-addon2">€</span>
		  </div>', ['class'=>'col-md-3'])
	, ['class'=>'row row-bet', 'style'=>'background-color:#F9F9F9']);

echo '<div class="row row-bet">';
echo Html::tag('div', '', ['class'=>'col-md-1']);
echo Html::tag('div', Html::a('Más opciones', '#', ['class'=>'btn btn-info']), ['class'=>'col-md-11']);

echo '</div>';

echo '<div class="row pull-right">';
echo Html::submitButton('Apostar', ['class'=>'btn btn-success', 'style'=>'margin-right:1em;', 'type'=>'submit']);
echo Html::a('Combinar', '#', ['class'=>'btn btn-info']);
echo '</div>';

echo Html::endForm();


