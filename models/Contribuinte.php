<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contribuinte".
 *
 * @property integer $id_contribuinte
 * @property string $nome
 * @property string $email
 * @property string $cpf
 * @property string $telefone
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
            [['nome', 'email', 'cpf', 'telefone'], 'required'],
            [['email'], 'email'],
            [['cpf'], 'match', 'pattern' => '/^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/'],
            [['nome', 'email', 'cpf', 'telefone'], 'string', 'max' => 255],
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
            'email' => 'E-mail',
            'cpf' => 'CPF',
            'telefone' => 'Telefone',
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
