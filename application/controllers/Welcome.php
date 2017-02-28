<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->library('encryption');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function test_encrypt(){
		/*$this->encryption->initialize(
	        array(
	            'cipher' => 'blowfish',
	            'driver' => 'openssl'
	        )
		);

		$plain_text = 'This is a plain-text message!';
		$ciphertext = $this->encryption->encrypt($plain_text);
		echo "text: ".$ciphertext;*/

		$code = $this->encrypt->encode("ayam");

		$code = strtr(
                $code,
                array(
                    '+' => '.',
                    '=' => '-',
                    '/' => '~'
                )
            );
		echo '<a href="'.site_url("welcome/test_decode/".$code).'">test</a>';
	}

	public function test_decode($code){
		$code = strtr(
            $code,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );
		echo $this->encrypt->decode($code);
	}

	public function test_encryptv2(){
		$plain_text = 'Welcome to Codeigniter 3 Dreamland!!!';

		$ciphertext = encryptInUrl($plain_text);

		echo 'Click here to reveal this Cipher Text <a href="'.site_url("welcome/test_decrypt/".$ciphertext).'">'.$ciphertext.'</a>';
	}

	public function test_decrypt($ciphertext){
		echo decryptInUrl($ciphertext);
	}
}
