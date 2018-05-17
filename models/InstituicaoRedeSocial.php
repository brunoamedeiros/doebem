<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instituicao_rede_social".
 *
 * @property int $id_instituicao
 * @property string $nome
 * @property string $url
 *
 * @property Instituicao $instituicao
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
            [['id_instituicao'], 'unique'],
            [['id_instituicao'], 'exist', 'skipOnError' => true, 'targetClass' => Instituicao::className(), 'targetAttribute' => ['id_instituicao' => 'id_instituicao']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_instituicao' => 'Cód Instituição',
            'nome' => 'Nome',
            'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstituicao()
    {
        return $this->hasOne(Instituicao::className(), ['id_instituicao' => 'id_instituicao']);
    }
}
