<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instituicao_rede_social".
 *
 * @property integer $id_instituicao
 * @property integer $id_rede_social
 * @property string $nome
 * @property string $url
 *
 * @property Instituicao $idInstituicao
 */
class InstituicaoRedeSocial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instituicao_rede_social';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_instituicao', 'nome', 'url'], 'required'],
            [['id_instituicao'], 'integer'],
            [['nome', 'url'], 'string', 'max' => 255],
            [['id_instituicao'], 'exist', 'skipOnError' => true, 'targetClass' => Instituicao::className(), 'targetAttribute' => ['id_instituicao' => 'id_instituicao']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_instituicao' => 'Id Instituicao',
            'id_rede_social' => 'Id Rede Social',
            'nome' => 'Nome',
            'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInstituicao()
    {
        return $this->hasOne(Instituicao::className(), ['id_instituicao' => 'id_instituicao']);
    }
}
