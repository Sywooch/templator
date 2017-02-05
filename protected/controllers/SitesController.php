<?php

namespace app\controllers;

use Yii;
use app\models\Sites;
use app\models\Templates;
use app\models\SitesFiles;
use app\models\Fields;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;


class SitesController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Sites::find()->where(['user_id' => Yii::$app->user->id]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Source model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {        
        $model = new Sites();

        if ($model->load(Yii::$app->request->post())) {
            $model->content = json_encode($_POST['Field']);
            $model->user_id = Yii::$app->user->id;

            if($model->save())
            {
                if(!is_int($_POST['site_id']))
                {
                    $files = SitesFiles::find()->where("tmp_site_id = '".$_POST['site_id']."'")->all();
                    foreach($files as $file)
                    {
                        $file->site_id = $model->id;
                        $file->tmp_site_id = '';
                        $file->path = str_replace($_POST['site_id'], $model->id, $file->path);
                        $file->save();
                    }
                    
                    if(is_dir(\Yii::getAlias('@webroot').'/files/'.$_POST['site_id']))
                        rename(\Yii::getAlias('@webroot').'/files/'.$_POST['site_id'], \Yii::getAlias('@webroot').'/files/'.$model->id);
                }
                
                $model->content = str_replace($_POST['site_id'], $model->id, $model->content);
                $model->save();
            
                return $this->redirect(['index']);
            }
        }            
            
        return $this->render('create', [
            'model' => $model,
            'fields' => '',
            'site_id' => 'temp'.microtime(1),
        ]);
    }

    /**
     * Updates an existing Source model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        /** @var Sites $model */
        $model = $this->findModel($id);
        $data = Yii::$app->request->post();

        if ($model->load($data)) {
            $model->content = json_encode($_POST['Field']);

            if($model->save()) {
                $model->generate();

                if ($data['submit'] === 'Сохранить и выйти') {
                    return $this->redirect(['index']);
                }
            }
        }

        $fields = [];
        if(!empty($model->content)) {
            $fields = $this->actionGetfields($model->template_id, json_decode($model->content, 1));
        }

        return $this->render('update', [
            'model' => $model,
            'fields' => $fields,
            'site_id' => $id,
        ]);
    }

    /**
     * Deletes an existing Source model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionGetfields($t_id, $f = [])
    {   
        $fields = Fields::find()->where('template_id = '.(int)$t_id)->orderBy('order ASC')->all();
        if(!$fields) {
            throw new NotFoundHttpException('404');
        }
         
        return $this->renderPartial('_fields', [
            'fields' => $fields,
            't_id' => $t_id,
            'f' => $f,
        ]);
    }
    
    public function actionGettpl($t_id)
    {
        $template = Templates::find()->where("id = '".$t_id."'")->one();
        if(!$template) {
            throw new NotFoundHttpException('404');
        }

        return $this->renderPartial('_tpl', [
            'schema' => $template->schema,
            'preview' => $template->preview,
        ]);
    }
    
    public function actionPreview($id)
    {
        $site = $this->findModel($id);
        if(!$site) {
            throw new NotFoundHttpException('404');
        }
        $url = $site->generate();
        
        return $this->redirect($url);
    }

    public function actionDownload($id)
    {
        $site = $this->findModel($id);
        if(!$site) {
            throw new NotFoundHttpException('404');
        }
        $site->generate();
        
        $zdir = \Yii::getAlias('@webroot')."/archives/";
        if(!is_dir($zdir))
            mkdir($zdir, 0777, 1);
            
        $zfile = $zdir.$site->url.".zip";
        
        $dir = \Yii::getAlias('@webroot')."/sites/".$site->id;

        $zip = new \ZipArchive();
        $zip->open($zfile, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            if (!$file->isDir())
            {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($dir) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        
        return $this->redirect('/archives/'.$site->url.'.zip');
    }

    public function actionUploadfile($site_id, $CKEditorFuncNum)
    {
        $model = new SitesFiles;

        $re = 'alert("Unable to upload the file")';                
        if (Yii::$app->request->isPost) 
        {
            $site = Sites::find()->where('id = "'.$site_id.'"')->one();
            $tmp_site_id = 0;
            if(!$site)
            {
                $tmp_site_id = $site_id;
                $site_id = 0;
            }
            
            $model->upload = \yii\web\UploadedFile::getInstanceByName('upload');
            
            $model->site_id = $site_id;
            $model->tmp_site_id = $tmp_site_id;
            $model->filename = $model->upload->baseName.'.'.$model->upload->extension;

            if(!$site_id)
                $dir = "/files/".$tmp_site_id.'/';
            else
                $dir = "/files/".$site_id.'/';

            $model->path = \Yii::getAlias('@webroot').$dir;
            
            if(!is_dir($model->path))
                mkdir($model->path, 0777, 1); 

            $model->path = $model->path.$model->filename;
            if ($model->save()) 
            {
                $model->upload->saveAs($model->path);
                $re = "window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '".$dir.$model->filename."')";
            }
        }
 
        echo "<script>$re;</script>";
    }

    /**
     * Finds the Source model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sites
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sites::find()->where(['id' => $id, 'user_id' => Yii::$app->user->id])->one()) !== null) {
            return $model;
        } else {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }
    }
}
