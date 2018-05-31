<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

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
class Instituicao extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $file;

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
            [['nome', 'cnpj', 'descricao', 'email', 'telefone', 'endereco', 'bairro', 'cep', 'file', 'vinculo_api'], 'required'],
            [['descricao'], 'string'],
            [['email'], 'email'],
            [['perfil'], 'integer'],
            [['nome', 'cnpj', 'email', 'telefone', 'endereco', 'bairro', 'cep', 'login', 'senha', 'imagem', 'video', 'vinculo_api'], 'string', 'max' => 255],
            [['file'], 'image']
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
            'file' => 'Imagem',
            'video' => 'Vídeo',
            'perfil' => 'Perfil',
            'vinculo_api' => 'Token PagSeguro',
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
        return $this->hasMany(InstituicaoRedeSocial::className(), ['id_instituicao' => 'id_instituicao']);
    }

    public function beforeValidate()
    {
        $this->file = UploadedFile::getInstance($this, 'file');

        if ($this->file) {
            $this->imagem = md5(uniqid() . mt_rand() . microtime()) . '.' . $this->file->getExtension();
        }

        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($this->imagem) {
            $this->file->saveAs('uploads/' . $this->imagem);
        }

        return parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id_instituicao;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public function validatePassword($password) {
        return $this->senha == $password;
    }
}
