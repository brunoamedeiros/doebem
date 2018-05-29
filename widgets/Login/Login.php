<?php

namespace app\widgets\Login;

use yii\base\Widget;

class Login extends Widget
{
    public function run()
    {
        $loginForm = new LoginForm;

        if ($loginForm->load(\Yii::$app->request->post()) && $loginForm->login()) {
            \Yii::$app->getResponse()->redirect(['doacao/index']);
        } else {
            return $this->render('loginWidget', [
                'modelLogin' => $loginForm,
            ]);
        }
    }
}