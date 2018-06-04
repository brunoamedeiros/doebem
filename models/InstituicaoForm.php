<?php
namespace app\models;

use app\models\Instituicao;
use app\models\InstituicaoRedeSocial;
use Yii;
use yii\base\Model;
use yii\widgets\ActiveForm;

class InstituicaoForm extends Model
{
  private $_instituicao;
  private $_sociais;

  public function rules()
  {
    return [
        [['Instituicao'], 'required'],
        [['Sociais'], 'safe'],
    ];
  }

  public function afterValidate()
  {
    if (!Model::validateMultiple($this->getAllModels())) {
      $this->addError(null); // add an empty error to prevent saving
    }
    parent::afterValidate();
  }

  public function save()
  {
    if (!$this->validate()) {
      return false;
    }

    $transaction = Yii::$app->db->beginTransaction();
    if (!$this->instituicao->save()) {
      $transaction->rollBack();
      return false;
    }

    if (!$this->saveSociais()) {
      $transaction->rollBack();
      return false;
    }

    $transaction->commit();
    return true;
  }

  public function saveSociais()
  {
    $keep = [];

    foreach ($this->sociais as $social) {
      $social->id_instituicao = $this->instituicao->id_instituicao;

      if (!$social->save(false)) {
        return false;
      }

      $keep[] = $social->id_rede_social;
    }

    $query = InstituicaoRedeSocial::find()->andWhere(['id_instituicao' => $this->instituicao->id_instituicao]);
    if ($keep) {
      $query->andWhere(['not in', 'id_rede_social', $keep]);
    }

    foreach ($query->all() as $social) {
      $social->delete();
    }
    return true;
  }

  public function getInstituicao()
  {
    return $this->_instituicao;
  }

  public function setInstituicao($instituicao)
  {
    if ($instituicao instanceof Instituicao) {
      $this->_instituicao = $instituicao;
    } else if (is_array($instituicao)) {
      $this->_instituicao->setAttributes($instituicao);
    }
  }

  public function getSociais()
  {
    if ($this->_sociais === null) {
      $this->_sociais = $this->instituicao->isNewRecord ? [] : $this->instituicao->sociais;
    }

    return $this->_sociais;
  }

  private function getSocial($key)
  {
    $social = $key && strpos($key, 'new') === false ? InstituicaoRedeSocial::findOne($key) : false;
        var_dump($social);die;
    if (!$social) {
      $social = new InstituicaoRedeSocial();
      $social->loadDefaultValues();
    }
    return $social;
  }

  public function setSociais($sociais)
  {
    unset($sociais['__id__']); // remove the hidden "new InstituicaoRedeSocial" row

    $this->_sociais = [];
    foreach ($sociais as $key => $social) {
      if (is_array($social)) {
        $this->_sociais[$key] = $this->getSocial($key);
        $this->_sociais[$key]->setAttributes($social);
      } elseif ($social instanceof InstituicaoRedeSocial) {
        $this->_sociais[$social->id_rede_social] = $social;
      }
    }
  }

  private function getAllModels()
  {
    $models = [
        'Instituicao' => $this->instituicao,
    ];

    foreach ($this->sociais as $id => $social) {
      $models['InstituicaoRedeSocial.' . $id] = $this->sociais[$id];
    }

    return $models;
  }
}