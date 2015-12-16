<?php
use yii\helpers\Html;

$this->title = "Mis apuestas";

echo Html::beginForm('', 'post', ["class"=>"site-bet"]);
echo Html::tag('h3', $this->title);

foreach($bets as $b){
	$quantity = 0;
	foreach($b['quantity'] as $q){
		$quantity += $q;
	}
	echo Html::tag('div', 
			Html::tag('div', '<i class="icon-football-soccer"></i>', ['class'=>'col-md-1'])
			.Html::tag('div', Html::tag('h5', "$b[0] vs $b[1]"), ['class'=>'col-md-6'])
			.Html::tag('div',  Html::tag('h5', $b[2]), ['class'=>'col-md-4'])
			.Html::tag('div', Html::tag('h5', $quantity." €"), ['class'=>'col-md-1'])
		, ['class'=>'row row-bet', 'style'=>'background-color:#F9F9F9']);

}

echo Html::endForm();