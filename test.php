<?php
PMVC\Load::plug();
PMVC\setPlugInFolder('../');
class FileListTest extends PHPUnit_Framework_TestCase
{
    function testFileList()
    {
        $files = \PMVC\plug('file_list')->ls('./');
        $this->assertTrue(!empty($files['./file_list.php']));
    }

}