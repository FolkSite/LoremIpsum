<?php/**    LoremIpsum    Generates LoremIpsum pages.        @created 2011/05/09    @author Oliver Leics    @version 0.1     */class LoremIpsum {    function __construct(modX &$modx, array $config = array()) {        $this->modx =& $modx;                $corePath = $modx->getOption('loremipsum.core_path',null,$modx->getOption('core_path').'components/loremipsum/');        $assetsUrl = $modx->getOption('loremipsum.assets_url',null,$modx->getOption('assets_url').'components/loremipsum/');                $this->config = array_merge(array(                        'corePath' => $corePath,            'modelPath' => $corePath.'model/',            'processorsPath' => $corePath.'processors/',            'controllersPath' => $corePath.'controllers/',            'includesPath' => $corePath.'includes/',            'baseUrl' => $assetsUrl,            'cssUrl' => $assetsUrl.'css/',            'jsUrl' => $assetsUrl.'js/',                        'elementId' => 'loremipsum-panel-home-div',                        'connectorUrl' => $assetsUrl.'connector.php'                    ), $config);            }        public function initialize() {        $modx =& $this->modx;        //         $modx->regClientStartupScript($this->config['jsUrl'].'mgr/loremipsum.js');        $modx->regClientStartupHTMLBlock('<script type="text/javascript">            Ext.onReady(function() {                LoremIpsum.config = '.$modx->toJSON($this->config).';            });        </script>');        $modx->regClientStartupScript($this->config['jsUrl'].'mgr/widgets/home.panel.js');        $modx->regClientStartupScript($this->config['jsUrl'].'mgr/sections/index.js');        //         $output = '<div id="'.$this->config['elementId'].'"></div>';        return $output;    }}