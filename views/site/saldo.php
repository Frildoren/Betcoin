<?php

/* @var $this yii\web\View */

use yii\helpers\Html; 

$this->title = 'Gestionar saldo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-saldo">
    <h1><?= Html::encode($this->title) ?></h1>
    <table>
        <tr>
            <td>Saldo actual</td>
            <td><?=$saldo?></td>
        </tr>
        <tr>
            <td>Saldo pendiente</td>
            <td><?=$pendiente?></td>
        </tr>
    </table>

</div>
