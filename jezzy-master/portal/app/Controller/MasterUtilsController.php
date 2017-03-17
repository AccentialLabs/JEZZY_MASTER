<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of MasterDashboardController
 *
 * @author user
 */
class MasterUtilsController extends AppController{
    //put your code here
    
    public function __construct($request = null, $response = null) {
        $this->layout = '';
       // $this->set('title_for_layout', '');
        parent::__construct($request, $response);
    }

	    public function beforeFilter() {
		
		}
    
     public function sendEmailPostPurchase() {
			$this->autoRender  = false;
	
			$query = "SELECT * FROM checkouts
							INNER JOIN users on users.id = checkouts.user_id
								WHERE payment_state_id = 1 AND date = DATE_ADD(CURDATE(), INTERVAL -3 DAY);;";		
		
		   $updateParams = array(
                'User' => array(
                    'query' => $query 
                )
            );
            $checkouts = $this->AccentialApi->urlRequestToGetData('users', 'query', $updateParams);
	
			if(!empty($checkouts)){
				
				foreach($checkouts as $check){
				
					$emailBody = "esse corpo do email";
					$userEmail = $check['users']['email'];
					$subject = "Como foi sua compra?";
					$this->sendEmailByPOST($emailBody, $userEmail, $subject);
				}
			}

			
    }
	
	public function sendEmailByPOST($emailBody, $emailAddress, $subject){
		
		
		$url = 'https://api.turbo-smtp.com/api/mail/send';

$data = array('authuser' => "contato@jezzy.com.br", 'authpass' => "NNmrU78FggRt23898G", 'from' => "contato@jezzy.com.br", 'to' => $emailAddress, 'subject' => $subject, 'html_content' => $emailBody);

$options = array(
        'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
		$context  = stream_context_create($options);
		$result = json_decode(file_get_contents($url, false, $context));



          // Exibe uma mensagem de resultado
          if ($result->message == "OK") {

               //ENVIADO

          } else {

              //NÃO ENVIADO
		}
		
		
		}
		
		public function rec(){
			$this->autoRender = false;
			
			echo "sasa s";
		}
	
}
