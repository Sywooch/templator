<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;
use app\models\CURL;
use app\models\SHTML;

use yii\console\Controller;

class HelloController extends Controller
{
    public function actionIndex()
    {
        $curl = new CURL;

        $p = 0;
        
        do
        {
            $p++;
            $curl->url = 'http://www.statkod.ru/czech_index'.$p.'.html';
            
            $page = $curl->sendquery();
            echo $p."\n";
            
            $html = SHTML::str_get_html($page);
            
            $trs = $html->find('.content table tr');
            
            foreach($trs as $tr)
            {
                $td = $tr->find('td');
                if(!isset($td[0]))
                    continue;
                
                $index = $td[0]->plaintext;
                $country = $td[2]->plaintext;
                $code = $td[3]->plaintext;
                $location = $td[4]->plaintext;
                $post_office = $td[5]->plaintext;
                
                \Yii::$app->db->createCommand("INSERT IGNORE INTO indexes SET 
                    `index` = '".$index."',
                    country = '".$country."',
                    code = '".$code."',
                    location = '".$location."',
                    post_office = '".$post_office."'
                    ")->execute();
            }
        }
        while(!empty($trs));
    }
}
