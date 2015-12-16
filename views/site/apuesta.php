<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Tabs;

$this->title = 'About';
?>

<div class="site-about bet">
    <h1><?= Html::encode(Yii::$app->request->get("sport")) ?></h1>

   <?php
        $tab1 = ''; 
        $tab2 = '';
        $tab3 = '';
        $tabs = [
            1 => [
                
            ],
            2 => [
                ['Getafe', 'Villarreal', '20/12/2015'],
                ['Real Madrid', 'Barcelona', '19/12/2015'],
                ['At. Madrid', 'Sevilla', '21/12/2015'],
                
            ],
			3 => [
				
			]
        ];
        foreach($tabs as $i=>$matches){
            foreach($matches as $m){
                ${"tab".$i} .= Html::tag("div", Html::tag("div",
                        Html::tag("div", "$m[0] vs. $m[1]", ['class' => 'col-md-4 match']).
                        Html::tag("div", "$m[2]", ['class' => 'col-md-4 date']).
                        Html::tag("div", Html::a("Apostar", ['bet', 'm'=>$m],
                                ['class' => 'btn btn-sm btn-success pull-right']), 
                                ['class' => 'col-md-4']), 
                        ['class' => 'row']),
                    ['class' => 'matches']);        
            }
        }
        
        echo Tabs::widget([
            'items' => [
            [
                'label' => 'Internacional',
                'content' => $tab1,
            ],
            [
                'label' => 'Nacional',
                'content' => $tab2,
                'active' => true,
            ],
            [
                'label' => 'Campeonatos',
                'content' => $tab3,
            ],
        ]]);
   
   ?>
</div>
