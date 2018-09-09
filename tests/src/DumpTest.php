<?php

namespace PMVC;

use PHPUnit_Framework_TestCase;

class DumpTest extends PHPUnit_Framework_TestCase
{
  private $_plug = 'file_list';

  /**
   * @runInSeparateProcess
   */
  public function testDump()
  {
    $p = \PMVC\plug($this->_plug);
    $file = __DIR__.'/../resources/demo.txt';
    ob_start(); 
    $p->dump($file);
    $content = ob_get_contents();
    ob_end_clean();
    $this->assertEquals(
      join("\n",range(1,6))."\n",
      $content
    );
  }
}
