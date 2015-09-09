<?php
namespace PMVC\PlugIn\file_list;

\PMVC\l(__DIR__.'/src/FileList.php');

${_INIT_CONFIG}[_CLASS] = __NAMESPACE__.'\file_list';

class file_list extends \PMVC\PlugIn
{
    private $olist;
    function init(){
        $this->olist = new FileList(); 
    }
    
    function ls(...$p){
        if ($this['hash']) {
            $this->olist->setChecksum($this['hash']);
        }
        return $this->olist->get(...$p);
    }

    function rmdir($dir){
        $list = $this->ls($dir);
        foreach($list as $item){
            $wholePath = $item['wholePath'];
            if (is_file($wholePath)) {
                unlink($wholePath);
            } elseif (is_dir($wholePath)) {
                rmdir($wholePath);
            }
        }
        rmdir($dir);
    }
}
?>