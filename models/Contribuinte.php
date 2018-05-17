<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contribuinte".
 *
 * @property int $id_contribuinte
 * @property string $nome
 * @property string $cpf
 * @property string $data_nascimento
 *
 * @property Contribuicao[] $contribuicaos
 */
class Contribuinte extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contribuinte';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'cpf', 'data_nascimento'], 'required'],
            [['nome', 'cpf', 'data_nascimento'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contribuinte' => 'Cód. Contribuinte',
            'nome' => 'Nome',
            'cpf' => 'CPF',
            'data_nascimento' => 'Data de Nascimento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContribuicoes()
    {
        return $this->hasMany(Contribuicao::className(), ['id_contribuinte' => 'id_contribuinte']);
    }
}
