<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $id_item
 * @property int $id_doacao
 * @property string $descricao
 * @property double $quantidade
 * @property double $valor
 * @property string $imagem
 *
 * @property Doacao $doacao
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_doacao', 'descricao', 'quantidade', 'valor', 'imagem'], 'required'],
            [['id_doacao'], 'integer'],
            [['descricao'], 'string'],
            [['quantidade', 'valor'], 'number'],
            [['imagem'], 'string', 'max' => 255],
            [['id_doacao'], 'exist', 'skipOnError' => true, 'targetClass' => Doacao::className(), 'targetAttribute' => ['id_doacao' => 'id_doacao']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_item' => 'Cód. Item',
            'id_doacao' => 'Cód. Doação',
            'descricao' => 'Descrição',
            'quantidade' => 'Quantidade',
            'valor' => 'Valor',
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
