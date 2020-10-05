<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-e9U28P4tDbuHoreVHCsnDtRL', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->database();
		
    }

    public function index()
    {
    	$this->load->view('transaction');
    }

    public function process()
    {
    	$order_id = $this->input->post('order_id');
    	$action = $this->input->post('action');
    	switch ($action) {
		    case 'status':
		        $this->status($order_id);
		        break;
		    case 'approve':
		        $this->approve($order_id);
		        break;
		    case 'expire':
		        $this->expire($order_id);
		        break;
		   	case 'cancel':
		        $this->cancel($order_id);
		        break;
		}

    }

	public function status($order_id)
	{
		// echo 'test get status </br>';
		// print_r ($this->veritrans->status($order_id) );
		$result = json_decode(json_encode($this->veritrans->status($order_id)), TRUE);
		$cek = $this->db->where('order_id', $order_id)->update('payment_mid', array('transaction_status' => $result['transaction_status']));
		if($cek){
			return $data['transaction_status'];
		}
		// if($cek){
		// 	echo "berhasil";
		// }
		// else{
		// 	echo "gagal";
		// }
		// if(isset($result["va_numbers"][0]["bank"])){
  //   		$bank = $result["va_numbers"][0]["bank"];
  //   	}
  //   	else{
  //   		$bank = "-";
  //   	}

  //   	if(isset($result['va_numbers'][0]['va_number'])){
  //   		$va_number = $result['va_numbers'][0]['va_number'];
  //   	}
  //   	else{
  //   		$va_number = "-";
  //   	}

  //   	if(isset($result['bill_key'])){
  //   		$bill_key = $result['bill_key'];
  //   	}
  //   	else{
  //   		$bill_key = "-";
  //   	}

  //   	if(isset($result['biller_code'])){
  //   		$biller_code = $result['biller_code'];
  //   	}
  //   	else{
  //   		$biller_code = "-";
  //   	}

  //   	if(isset($result['permata_va_number'])){
  //   		$permata_va_number = $result['permata_va_number'];
  //   	}
  //   	else{
  //   		$permata_va_number = "-";
  //   	}

  //   	if(isset($result['bca_va_number'])){
  //   		$bca_va_number = $result['bca_va_number'];
  //   	}
  //   	else{
  //   		$bca_va_number = "-";
  //   	}

  //   	$data = array(
  //   		'status_code' => $result["status_code"],
  //   		'status_message' => $result["status_message"],
  //   		'transaction_id' => $result["transaction_id"],
  //   		'order_id' => $result['order_id'],
  //   		'gross_amount' => $result['gross_amount'],
  //   		'payment_type' => $result['payment_type'],
  //   		'transaction_time' => $result['transaction_time'],
  //   		'transaction_status' => $result['transaction_status'],
  //   		'fraud_status' => $result['fraud_status'],
  //   		// 'pdf_url' => $result['pdf_url'],
  //   		// 'finish_redirect_url' => $result['finish_redirect_url'],

  //   		'permata_va_number' => $permata_va_number,
  //   		'bank' => $bank,
  //   		'va_number' => $va_number,
  //   		'bill_key' => $bill_key,
  //   		'biller_code' => $biller_code,
  //   		'bca_va_number' => $bca_va_number,
  //   	);
  //   	echo $data['status_code'].'<br>';
  //   	echo $data['status_message'].'<br>';
  //       echo $data['transaction_id'].'<br>';
  //       echo $data['order_id'].'<br>';
  //       echo $data['gross_amount'].'<br>';
  //       echo $data['payment_type'].'<br>';
  //       echo $data['transaction_time'].'<br>';
  //       echo $data['transaction_status'].'<br>';
  //       echo $data['fraud_status'].'<br>';
  //       echo $data['pdf_url'].'<br>';
  //       echo $data['finish_redirect_url'].'<br>';
  //       echo $data['permata_va_number'].'<br>';
  //       echo $data['bank'].'<br>';
  //       echo $data['va_number'].'<br>';
  //       echo $data['bill_key'].'<br>';
  //       echo $data['biller_code'].'<br>';
  //       echo $data['bca_va_number'].'<br>';

  //   	$ins = $this->db->insert('payment_mid', $data);
  //       if($ins){
  //           echo "Data berhasil masuk";
  //       }
  //       else{
  //           echo "Data gagal masuk";
  //       }
	}

	public function cancel($order_id)
	{
		echo 'test cancel trx </br>';
		echo $this->veritrans->cancel($order_id);
	}

	public function approve($order_id)
	{
		echo 'test get approve </br>';
		print_r ($this->veritrans->approve($order_id) );
	}

	public function expire($order_id)
	{
		echo 'test get expire </br>';
		print_r ($this->veritrans->expire($order_id) );
	}
}
