<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aluno".
 *
 * @property integer $id
 * @property integer $matricula
 * @property string $nome
 * @property string $sexo
 * @property integer $id_curso
 * @property integer $ano_ingresso
 *
 * @property Curso $idCurso
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aluno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matricula', 'nome', 'sexo', 'id_curso', 'ano_ingresso'], 'required', 'message' =>'Este Campo é Obrigatório'],
            [['matricula', 'id_curso', 'ano_ingresso'], 'integer'],
            [['nome'], 'string', 'max' => 200],
            [['sexo'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'matricula' => 'Matrícula',
            'nome' => 'Nome Completo',
            'sexo' => 'Sexo',
            'id_curso' => 'Curso de Graduação',
            'ano_ingresso' => 'Ano de Ingresso',
            'curso.nome' => 'Curso de Graduação',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */


    public function getIdCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'id_curso']);
    }

    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'id_curso']);
    }

    public function beforeFind(){
        $this->nome = strtolower($this->nome);     

    }

    //public function getArraySexo(){
    //    return array('Masculino' => 'Masculino', 'Feminino' => 'Feminino');     
    //}

    public function afterFind(){
        $this->nome = ucwords(strtolower($this->nome)); 

        if ($this->sexo == 'M'){
            $this->sexo = 'Masculino';
        }else{
            $this->sexo = 'Feminino';
        }  
    }

 
}
