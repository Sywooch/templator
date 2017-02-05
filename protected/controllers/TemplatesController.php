<?php

namespace app\controllers;

use Yii;
use app\models\Templates;
use app\models\Files;
use app\models\Fields;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class TemplatesController extends Controller
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
            'query' => Templates::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionUpdate()
    {
        $dir = \Yii::getAlias('@webroot')."/templates/";
        
        if($handle = opendir($dir))
            while ($tpl = readdir($handle)) 
            {
	            if($tpl != '.' AND $tpl != '..' AND is_dir($dir.$tpl))
	            {
	                if(!file_exists($dir.$tpl.'/index.php'))
	                    continue;
	                    
                    $file = file_get_contents($dir.$tpl.'/index.php');
                  //  $file = iconv('Windows-1251', 'UTF-8', $file);
                    
                    $template = Templates::find()->where('title = "'.$tpl.'"')->one();
                    
                    if(!$template)
                    {
                        $template = new Templates;
                        $template->title = $tpl;
                        $template->schema = '/templates/'.$tpl.'/schema.png';
                        $template->preview = '/templates/'.$tpl.'/preview.png';
                        $template->template = '';
                        $template->save();
                    }

                    preg_match_all('/\{\{(.*?)\}\}/ism', $file, $fields);
                    
                    $c = 0;
                    foreach($fields[1] as $field)
                    {
                        $name = Fields::create($field, $template->id, ++$c, $dir.$tpl);
                        
                        if(($pos = strpos($file, "{{".$field."}}")) !== false) {
                            $file = substr_replace($file, '{{'.$name.'}}', $pos, strlen($field)+4);
                        }
                    }   
                    
                    Fields::cleaning($fields[1], $template->id);
                    
                    $template->template = $file;
                    $template->save();
                    
                    Files::addNew($dir.$tpl, $template->id);
                    Files::deleteUnexisted($dir.$tpl, $template->id);
	            }
            }
	        closedir($handle);
	        
       return $this->redirect(['index']);
    }
    
    public function actionGetimages($template_id)
    {
        $template = Templates::find()->where('id = '.(int)$template_id.'')->one();
        
        $files = Files::find()->where("filename LIKE 'images%' AND template_id = ".(int)$template_id."")->all();
        $return = [];
        foreach($files as $file)
        {
            $f = explode('/', $file->filename);
            $return[] = '{title: "'.$f[1].'", value: "templates/'.$template->title.'/images/'.$f[1].'"}';
        }
        header('Content-type: text/javascript'); 
        header('pragma: no-cache');
        header('expires: 0');
        echo "[".implode(', ', $return)."]";
    }

    /**
     * Finds the Source model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Templates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Templates::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
