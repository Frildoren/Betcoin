<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\sidenav\SideNav;
use yii\helpers\Url;

use kartik\icons\Icon;
use kartik\icons\FontAwesomeAsset;
use kartik\icons\WhhgAsset;

Icon::map($this, Icon::WHHG);

AppAsset::register($this);

$type = SideNav::TYPE_DEFAULT;
$heading = '<span id="sports-icon" class="glyphicon glyphicon-"></span> Deportes';
$items = [
	// Important: you need to specify url as 'controller/action',
	// not just as 'controller' even if default action is used.
	['label' => 'Fútbol', 'icon' => ''/*Icon::show('')*/, 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
        ['label' => 'Baloncesto', 'icon' => '', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
        ['label' => 'Fórmula 1', 'icon' => 'road', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
        ['label' => 'Béisbol', 'icon' => '', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
        ['label' => 'Rugby', 'icon' => '', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
        ['label' => 'Tenis', 'icon' => '', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
        ['label' => 'Fútbol americano', 'icon' => '', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
        ['label' => 'Balonmano', 'icon' => '', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
        ['label' => 'Natación', 'icon' => '', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
        ['label' => 'Waterpolo', 'icon' => '', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
//	['label' => 'Books', 'icon' => 'book', 'items' => [
//			['label' => '<span class="pull-right badge">10</span> New Arrivals', 'url' => Url::to(['/site/new-arrivals', 'type' => $type]), 'active' => false],
//			['label' => '<span class="pull-right badge">5</span> Most Popular', 'url' => Url::to(['/site/most-popular', 'type' => $type]), 'active' => false],
//			['label' => 'Read Online', 'icon' => 'cloud', 'items' => [
//					['label' => 'Online 1', 'url' => Url::to(['/site/online-1', 'type' => $type]), 'active' => false],
//					['label' => 'Online 2', 'url' => Url::to(['/site/online-2', 'type' => $type]), 'active' => false]
//				]],
//		]],
//	['label' => '<span class="pull-right badge">3</span> Categories', 'icon' => 'tags', 'items' => [
//			['label' => 'Fiction', 'url' => Url::to(['/site/fiction', 'type' => $type]), 'active' => false],
//			['label' => 'Historical', 'url' => Url::to(['/site/historical', 'type' => $type]), 'active' => false],
//			['label' => '<span class="pull-right badge">2</span> Announcements', 'icon' => 'bullhorn', 'items' => [
//					['label' => 'Event 1', 'url' => Url::to(['/site/event-1', 'type' => $type]), 'active' => false],
//					['label' => 'Event 2', 'url' => Url::to(['/site/event-2', 'type' => $type]), 'active' => false]
//				]],
//		]],
//	['label' => 'Profile', 'icon' => 'user', 'url' => Url::to(['/site/profile', 'type' => $type]), 'active' => false],
];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>
	<body>
		<?php $this->beginBody() ?>

		<div class="wrap">
		<?php
		NavBar::begin([
			'brandLabel' => Yii::$app->params['name'],
			'brandUrl' => Yii::$app->homeUrl,
			'options' => [
				'class' => 'navbar-default navbar-fixed-top',
			],
		]);
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav'],
			'items' => [
				['label' => 'Resultados', 'url' => ['/site/resultados']],
				['label' => 'Mis apuestas', 'url' => ['/site/mis-apuestas']],
			],
		]);
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => [
				Yii::$app->user->isGuest ?
						['label' => 'Login', 'url' => ['/site/login']] :
						[
					'label' => 'Mi cuenta', //Yii::$app->user->identity->username,
					'url' => ['/site/index'],
						],
			],
		]);
		NavBar::end();
		?>

			<div class="container">
				<div class="col-md-3">
				<?=
				SideNav::widget([
					'type' => $type,
					'encodeLabels' => false,
					'heading' => $heading,
					'items' => $items,
				]);
				?>
				</div>
				<div class="col-md-9">
					<?=
					Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					])
					?>
					<?= $content ?>
				</div>
			</div>
		</div>

		<footer class="footer">
			<div class="container">
				<p class="pull-left">&copy; <?= Yii::$app->params['name'], " ", date('Y') ?></p>

			</div>
		</footer>

		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>
