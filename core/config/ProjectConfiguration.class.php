<?php

require_once realpath(dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php');
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->setWebDir(realpath(dirname(__FILE__).'/../'));
    $this->enablePlugins('sfDoctrinePlugin');
  }
}
