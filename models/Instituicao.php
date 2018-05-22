<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instituicao".
 *
 * @property integer $id_instituicao
 * @property string $nome
 * @property string $cnpj
 * @property string $descricao
 * @property string $email
 * @property string $telefone
 * @property string $endereco
 * @property string $bairro
 * @property string $cep
 * @property string $login
 * @property string $senha
 * @property string $imagem
 * @property string $video
 * @property integer $perfil
 * @property string $vinculo_api
 *
 * @property Doacao[] $doacaos
 * @property InstituicaoRedeSocial $instituicaoRedeSocial
 */
class Instituicao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instituicao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'cnpj', 'descricao', 'email', 'telefone', 'endereco', 'bairro', 'cep'], 'required'],
            [['descricao'], 'string'],
            [['perfil'], 'integer'],
            [['nome', 'cnpj', 'email', 'telefone', 'endereco', 'bairro', 'cep', 'login', 'senha', 'imagem', 'video', 'vinculo_api'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_instituicao' => 'Cód. Instituição',
            'nome' => 'Nome',
            'cnpj' => 'CNPJ',
            'descricao' => 'Descrição',
            'email' => 'E-mail',
            'telefone' => 'Telefone',
            'endereco' => 'Endereço',
            'bairro' => 'Bairro',
            'cep' => 'CEP',
            'login' => 'Login',
            'senha' => 'Senha',
            'imagem' => 'Imagem',
            'video' => 'Vídeo',
            'perfil' => 'Perfil',
            'vinculo_api' => 'Vínculo com API',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoacoes()
    {
        return $this->hasMany(Doacao::className(), ['id_instituicao' => 'id_instituicao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstituicaoRedeSocial()
    {
        return $this->hasOne(InstituicaoRedeSocial::className(), ['id_instituicao' => 'id_instituicao']);
    }
}
