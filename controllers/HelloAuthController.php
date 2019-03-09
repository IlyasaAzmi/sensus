<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class HelloAuthController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['private-page', 'secret-page'],
                'rules' => [
                    [
                        'actions' => ['private-page', 'secret-page'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionPrivatePage()
    {
        echo "Ini adalah private page";
    }

    public function actionSecretPage()
    {
        echo "Ini adalah secrete page";
    }

}
