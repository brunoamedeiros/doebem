<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contribuicao".
 *
 * @property int $id_contribuicao
 * @property int $id_contribuinte
 * @property int $id_doacao
 * @property double $valor
 *
 * @property Contribuinte $contribuinte
 * @property Doacao $doacao
 */
class Contribuicao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contribuicao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contribuinte', 'id_doacao', 'valor'], 'required'],
            [['id_contribuinte', 'id_doacao'], 'integer'],
            [['valor'], 'number'],
            [['id_contribuinte'], 'exist', 'skipOnError' => true, 'targetClass' => Contribuinte::className(), 'targetAttribute' => ['id_contribuinte' => 'id_contribuinte']],
            [['id_doacao'], 'exist', 'skipOnError' => true, 'targetClass' => Doacao::className(), 'targetAttribute' => ['id_doacao' => 'id_doacao']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contribuicao' => 'Cód. Contribuição',
            'id_contribuinte' => 'Cód. Contribuinte',
            'id_doacao' => 'Cód. Doação',
            'valor' => 'Valor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContribuinte()
    {
        return $this->hasOne(Contribuinte::className(), ['id_contribuinte' => 'id_contribuinte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoacao()
    {
        return $this->hasOne(Doacao::className(), ['id_doacao' => 'id_doacao']);
    }
}
