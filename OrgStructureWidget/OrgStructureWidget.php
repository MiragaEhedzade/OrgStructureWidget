<?php
/**
 * OrgStructureWidget
 *
 * @author   Ahadzade Miraga <miraga.ehedzade@gmail.com>
 **/
class OrgStructureWidget extends CWidget
{
    public $organizations;
    
    public function init()
    {
        parent::init();
    }
    
    public function run()
    {
        $jsArray = array();
        if ($this->organizations) {
            foreach ($this->organizations as $array) {
                $jsArray[] = array('id' => $array['id'], 'name' => $array['name'], 'parent' => $array['parent']);
            }
        }
        $baseDir = dirname(__file__);
        $assets = Yii::app()->getAssetManager()->publish($baseDir . DIRECTORY_SEPARATOR .
            'assets');
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($assets . '/css/jquery.orgchart.css');
        echo '<div id="orgChartContainer">
                <div id="orgChart"></div>
              </div>';
        Yii::app()->clientScript->registerScript('setVar', '
            var organizations = ' . json_encode($jsArray) . ';
        ', CClientScript::POS_BEGIN);
        $cs->registerScriptFile($assets . '/js/jquery2.min.js', CClientScript::POS_END);
        $cs->registerScriptFile($assets . '/js/bootstrap.min.js', CClientScript::POS_END);
        $cs->registerScriptFile($assets . '/js/jquery.orgchart.js', CClientScript::POS_END);
        $cs->registerScriptFile($assets . '/js/main.js', CClientScript::POS_END); 
    }
}
?>