<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resultado".
 *
 * @property int $id_resultado
 * @property int $id_doacao
 * @property string $descricao
 * @property string $data
 * @property string $imagem
 *
 * @property Doacao $doacao
 */
class Resultado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resultado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_doacao', 'descricao', 'data', 'imagem'], 'required'],
            [['id_doacao'], 'integer'],
            [['descricao', 'imagem'], 'string'],
            [['data'], 'safe'],
            [['id_doacao'], 'exist', 'skipOnError' => true, 'targetClass' => Doacao::className(), 'targetAttribute' => ['id_doacao' => 'id_doacao']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_resultado' => 'Cód. Resultado',
            'id_doacao' => 'Cód. Doação',
            'descricao' => 'Descrição',
            'data' => 'Data',
            'imagem' => 'Imagem',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoacao()
    {
        return $this->hasOne(Doacao::className(), ['id_doacao' => 'id_doacao']);
    }
}
