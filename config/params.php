<?php
use app\models\LoginForm;
use yii\base\Event;
use yii\web\View;

Event::on(View::className(), View::EVENT_BEFORE_RENDER, function() {
  $modelLogin = new LoginForm();
  Yii::$app->view->params['modelLogin'] = $modelLogin;
});

return [
    'adminEmail' => 'admin@example.com',
];
