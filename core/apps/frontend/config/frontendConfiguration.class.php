<?php

class frontendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
	 $this->getActive()->loadHelpers(array('Tag', 'Text', 'JavascriptBase', 'Date', 'Url', 'I18N','gcross'));
  }
}
