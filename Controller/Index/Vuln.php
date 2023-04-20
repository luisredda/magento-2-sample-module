<?php

namespace Mageplaza\HelloWorld\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{

	public function execute()
	{
		$textDisplay = new \Magento\Framework\DataObject(array('text' => 'Mageplaza'));
		$this->_eventManager->dispatch('mageplaza_helloworld_display_text', ['mp_text' => $textDisplay]);
		echo $textDisplay->getText();
    
        // sending the cookie
    $secret_word = 'gargamel';
    $id = 123745323;
    $hash = md5($secret_word.$id);
    setcookie('id',$id.'-'.$hash);

    // receiving and verifying the cookie
    list($cookie_id,$cookie_hash) = explode('-',$_COOKIE['id']);
    if (md5($secret_word.$cookie_id) == $cookie_hash) {
        $id = $cookie_id;
    } else {
        die('Invalid cookie.');
    }

		exit;
	}
}
