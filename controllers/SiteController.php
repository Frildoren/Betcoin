<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
	
	private $session = null;
	private function getSession(){
		if($this->session === null){
			$this->session = new \yii\web\Session;
			$this->session->open();
		}
		return $this->session;
	}
	
	private function getVar($v){
		$session = $this->getSession();
		
		if(isset($session[$v])){
			return $session[$v];
		}
	}
	
	private function setVar($i, $v){
		$session = $this->getSession();
		$session[$i] = $v;
	}

    public function actionIndex()
    {
		if(\Yii::$app->user->isGuest){
			return $this->redirect(['login']); 
		}
        return $this->render('index', [
			'saldo'=>intval($this->getVar('saldo')),
			'pendiente'=>intval($this->getVar('pendiente')),
		]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
	
	public function actionResultados(){
		return $this->render('resultados');
	}

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionSaldo() {
		
		if(Yii::$app->request->post()){
			
			if(null!==(Yii::$app->request->post('method')) && Yii::$app->request->post('method') == 0){
					
				Yii::$app->getSession()->setFlash('danger', [
					'type' => 'danger',
					'duration' => 5000,
					'icon' => 'glyphicon glyphicon-alert',
					'title' => 'Error',
					'message' => 'El método de pago es incorrecto',
					'positonY' => 'top',
					'positonX' => 'center'
				]);

				return $this->refresh();
			}
			
			$this->setVar('saldo', intval($this->getVar('saldo')) + intval(Yii::$app->request->post('quantity')));
			if(Yii::$app->request->post('card')){				
				$methods = $this->getVar('methods');
				$methods[] = Yii::$app->request->post('card');
				$this->setVar('methods', $methods);
			}
		}
		
        return $this->render('saldo', [
            'saldo' => intval($this->getVar('saldo')),
            'pendiente' => intval($this->getVar('pendiente')),
            'metodos' => $this->getVar('methods') ? $this->getVar('methods') : [],
        ]);
    }
	
	public function actionApuesta(){
		return $this->render('apuesta');
	}
	
	public function actionBet(array $m){
		
		if(Yii::$app->request->post()){
			$suma = 0;
			foreach(Yii::$app->request->post('quantity') as $q){
				$suma += intval($q);
			}
			
			if($suma > intval($this->getVar('saldo'))){
				Yii::$app->getSession()->setFlash('success', [
					'type' => 'danger',
					'duration' => 5000,
					'icon' => 'glyphicon glyphicon-alert',
					'title' => 'Saldo insuficiente',
					'message' => 'No tiene suficiente saldo en su cuenta para realizar esa apuesta',
					'positonY' => 'top',
					'positonX' => 'center'
				]);
				return $this->refresh();
			} else {
				$this->setVar('saldo', intval($this->getVar('saldo')) - $suma);
				$this->setVar('pendiente', intval($this->getVar('pendiente')) + $suma);

				$bets = $this->getVar('bets');
				$bet = $m;
				$bet['quantity'] = Yii::$app->request->post('quantity');
				$bets[] = $bet;
				$this->setVar('bets', $bets);
				
				Yii::$app->getSession()->setFlash('success', [
					'type' => 'success',
					'duration' => 5000,
					'icon' => 'glyphicon glyphicon-ok',
					'title' => 'Hecho',
					'message' => 'Apuesta realizada correctamente',
					'positonY' => 'top',
					'positonX' => 'center'
				]);
				return $this->redirect(['apuestas']);
			}
		}
		
		return $this->render('bet', [
			'a'=>$m[0],
			'b'=>$m[1],
			'date'=>$m[2]
		]);
	}
	
	
	public function actionApuestas(){
		
		$bets = $this->getVar('bets');
		
		return $this->render('apuestas', [
			'bets' => $bets
		]);
	}
}
