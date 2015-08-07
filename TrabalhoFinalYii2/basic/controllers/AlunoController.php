<?php

namespace app\controllers;

use Yii;
use app\models\Aluno;
use app\models\Curso;
use app\models\AlunoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlunoController implements the CRUD actions for Aluno model.
 */
class AlunoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Aluno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlunoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aluno model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id = NULL)      //passar dados para a view através da url
    {
        if($id == NULL){
            $id = '1148';
        }

        //encontra o aluno
        $aluno = Aluno::findOne($id);
         //salva o ano que ele entrou na faculdade
        $ano = $aluno->ano_ingresso;

         //salva o número de alunos que existem do mesmo ano
        $totalAlunos = Aluno::find()->where('ano_ingresso='.$ano)->count();

        return $this->render('view', [
            'model' => $this->findModel($id),       //findModel é usado apenas para chave primária                          
            'totalAlunos' => $totalAlunos,  //se o id não for informado, usar o findOne para recuperar a instância dos meus dados e passar o novo model para a view
            'ano' => $ano,
        ]);
    }

    /**
     * Creates a new Aluno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Aluno();
        $arraycursos = Curso::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'cursos' => $arraycursos,
            ]);
        }
    }

    /**
     * Updates an existing Aluno model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]); 
        }
    }

    /**
     * Deletes an existing Aluno model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionTurma($ano)
    {
        $alunos = Aluno::find()->where('ano_ingresso='.$ano)->all();

        return $this->render('turma', [
            'alunos' => $alunos,
        ]);
    }

    /**
     * Finds the Aluno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aluno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aluno::findOne($id)) !== null) {      //cria uma função estática para referenciar uma instância do Aluno. Ou seja, essa função findOne procura o objeto
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
