<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');
 
$browser = new StackendTestFunctional(new sfBrowser());
$browser->loadData();
 
$browser->
  info('1 - Authentication')->
  get('/affiliate')->
  click('Signin', array(
    'signin' => array('username' => 'admin', 'password' => 'admin'),
    array('_with_csrf' => true)
  ))->
  with('response')->isRedirected()->
  followRedirect()->
 
  info('2 - When validating an affiliate, an email must be sent with its token')->
  click('Activate', array(), array('position' => 1))->
  with('mailer')->begin()->
    checkHeader('Subject', '/Stackend affiliate token/')->
    checkBody('/Your token is symfony/')->
  end()
;
