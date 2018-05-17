<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doacao".
 *
 * @property int $id_doacao
 * @property int $id_instituicao
 * @property string $titulo
 * @property string $descricao
 * @property string $data_publicacao
 * @property string $imagem_perfil
 * @property string $video
 * @property string $imagem_capa
 *
 * @property Contribuicao[] $contribuicaos
 * @property Instituicao $instituicao
 * @property Item[] $items
 * @property Resultado[] $resultados
 */
class Doacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_instituicao', 'titulo', 'descricao', 'data_publicacao', 'imagem_perfil', 'imagem_capa'], 'required'],
            [['id_instituicao'], 'integer'],
            [['descricao', 'imagem_capa'], 'string'],
            [['data_publicacao'], 'safe'],
            [['titulo', 'imagem_perfil', 'video'], 'string', 'max' => 255],
            [['id_instituicao'], 'exist', 'skipOnError' => true, 'targetClass' => Instituicao::className(), 'targetAttribute' => ['id_instituicao' => 'id_instituicao']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_doacao' => 'Cód. Doação',
            'id_instituicao' => 'Cód. Instituição',
            'titulo' => 'Título',
            'descricao' => 'Descrição',
            'data_publicacao' => 'Data de Publicação',
            'imagem_perfil' => 'Imagem de Perfil',
            'video' => 'Vídeo',
            'imagem_capa' => 'Imagem de Capa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContribuicoes()
    {
        return $this->hasMany(Contribuicao::className(), ['id_doacao' => 'id_doacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstituicao()
    {
        return $this->hasOne(Instituicao::className(), ['id_instituicao' => 'id_instituicao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['id_doacao' => 'id_doacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultados()
    {
        return $this->hasMany(Resultado::className(), ['id_doacao' => 'id_doacao']);
    }
}
