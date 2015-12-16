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
    ['label' => Icon::show('football-soccer').'Fútbol', 'url' => Url::to(['/site/apuesta', 'sport' => 'Fútbol',]), 'active' => false],
    ['label' => Icon::show('basketball').'Baloncesto', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('raceflag').'Fórmula 1', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('usfootball').'Rugby', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('tennis').'Tenis', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('usfootball').'Fútbol americano', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('bowlingpins').'Bolos', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('boxing').'Boxeo', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('bow').'Tiro con arco', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('cricket').'Cricket', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('curling').'Curling', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('dart').'Dardos', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('golf').'Golf', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('hockey').'Hockey', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('tabletennis-pingpong').'Ping Pong', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('knight').'Ajedrez', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],
    ['label' => Icon::show('spades').'Póker', 'url' => Url::to(['/site/home', 'type' => $type]), 'active' => false],



    

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
		
		if(Yii::$app->user->isGuest){
			$navItems = [
				['label' => 'Login', 'url' => ['/site/login']]
			];
		} else {
			$navItems = [
				['label' => 'Mi cuenta', //Yii::$app->user->identity->username,
				'url' => ['/site/index']],
				['label' => 'Logout', 'url'=>Url::to(['site/logout']), 'options'=>['data-method'=>'post']]
			];
		}
		
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => $navItems,
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
