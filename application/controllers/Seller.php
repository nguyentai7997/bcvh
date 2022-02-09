<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Mteemarket');
	}

	public function index()
	{
		redirect('http://localhost:8012/teemarket/seller/dashboard');
	}

	public function dashboard(){
		if (empty($_SESSION['user'])) {
			redirect('http://localhost:8012/teemarket/login');
		} else {
			$this->load->view('dashboard_view');
		}
	}

	public function get_orders_today(){
		if ($this->input->post('code')) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$date = date("Y-m-d");
			$allData = array();

			for ($i = 0; $i < 24; $i++) {
				if ($i < 10) {
					$data1 = $this->Mteemarket->getDataByTime($date . ' 0' . $i, $_SESSION['user']['id']);
					array_push($allData, $data1);
				} else {
					$data2 = $this->Mteemarket->getDataByTime($date . ' ' . $i, $_SESSION['user']['id']);
					array_push($allData, $data2);
				}
			}

			for ($i = 0; $i < count($allData); $i++) {
				if ($allData[$i] != array()) {
					$unit = 0;
					$profit = 0;
					for ($k = 0; $k < count($allData[$i]); $k++) {
						$unit += $allData[$i][$k]["quantity"];
						$profit += ($allData[$i][$k]["quantity"] * $allData[$i][$k]["price"]);
					}
					array_push($allData[$i], $unit);
					array_push($allData[$i], $profit);
				}
			}

			for ($i = 0; $i < 24; $i++) {
				if ($i < 10) {
					$orders1 = $this->Mteemarket->getOrdersByTime($date . ' 0' . $i, $_SESSION['user']['id']);
					array_push($allData[$i], $orders1[0]);
				} else {
					$orders2 = $this->Mteemarket->getOrdersByTime($date . ' ' . $i, $_SESSION['user']['id']);
					array_push($allData[$i], $orders2[0]);
				}
			}

			$campaignActive = count($this->Mteemarket->getCampaignActive($_SESSION['user']['id']));
			$campaignEnded = count($this->Mteemarket->getCampaignEnded($_SESSION['user']['id']));
			array_push($allData, $campaignActive);
			array_push($allData, $campaignEnded);

			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function get_orders_yesterday(){
		if ($this->input->post('code')) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$date = date("Y-m-d");
			$yesterday = date("Y-m-d", strtotime('-1 days', strtotime($date)));
			$allData = array();

			for ($i = 0; $i < 24; $i++) {
				if ($i < 10) {
					$data1 = $this->Mteemarket->getDataByTime($yesterday . ' 0' . $i, $_SESSION['user']['id']);
					array_push($allData, $data1);
				} else {
					$data2 = $this->Mteemarket->getDataByTime($yesterday . ' ' . $i, $_SESSION['user']['id']);
					array_push($allData, $data2);
				}
			}

			for ($i = 0; $i < count($allData); $i++) {
				if ($allData[$i] != array()) {
					$unit = 0;
					$profit = 0;
					for ($k = 0; $k < count($allData[$i]); $k++) {
						$unit += $allData[$i][$k]["quantity"];
						$profit += ($allData[$i][$k]["quantity"] * $allData[$i][$k]["price"]);
					}
					array_push($allData[$i], $unit);
					array_push($allData[$i], $profit);
				}
			}

			for ($i = 0; $i < 24; $i++) {
				if ($i < 10) {
					$orders1 = $this->Mteemarket->getOrdersByTime($yesterday . ' 0' . $i, $_SESSION['user']['id']);
					array_push($allData[$i], $orders1[0]);
				} else {
					$orders2 = $this->Mteemarket->getOrdersByTime($yesterday . ' ' . $i, $_SESSION['user']['id']);
					array_push($allData[$i], $orders2[0]);
				}
			}

			$campaignActive = count($this->Mteemarket->getCampaignActive($_SESSION['user']['id']));
			$campaignEnded = count($this->Mteemarket->getCampaignEnded($_SESSION['user']['id']));
			array_push($allData, $campaignActive);
			array_push($allData, $campaignEnded);

			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function get_orders_7_days_left(){
		if ($this->input->post('code')) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$date = date("Y-m-d");
			$dayLeft = date("Y-m-d", strtotime('-7 days', strtotime($date)));

			$allDays = array();
			for ($i = 0; $i < 7; $i++) {
				$day = date("Y-m-d", strtotime('+' . $i . 'days', strtotime($dayLeft)));
				array_push($allDays, $day);
			}

			$allData = array();
			for ($i = 0; $i < count($allDays); $i++) {
				$data = $this->Mteemarket->getDataByTime($allDays[$i], $_SESSION['user']['id']);
				array_push($allData, $data);
			}

			for ($i = 0; $i < count($allData); $i++) {
				if ($allData[$i] != array()) {
					$unit = 0;
					$profit = 0;
					for ($k = 0; $k < count($allData[$i]); $k++) {
						$unit += $allData[$i][$k]["quantity"];
						$profit += ($allData[$i][$k]["quantity"] * $allData[$i][$k]["price"]);
					}
					array_push($allData[$i], $unit);
					array_push($allData[$i], $profit);
				}
			}

			for ($i = 0; $i < count($allDays); $i++) {
				$orders = $this->Mteemarket->getOrdersByTime($allDays[$i], $_SESSION['user']['id']);
				array_push($allData[$i], $orders[0]);
			}

			$campaignActive = count($this->Mteemarket->getCampaignActive($_SESSION['user']['id']));
			$campaignEnded = count($this->Mteemarket->getCampaignEnded($_SESSION['user']['id']));
			array_push($allData, $campaignActive);
			array_push($allData, $campaignEnded);

			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function get_orders_30_days_left(){
		if ($this->input->post('code')) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$date = date("Y-m-d");
			$dayLeft = date("Y-m-d", strtotime('-30 days', strtotime($date)));

			$allDays = array();
			for ($i = 0; $i < 30; $i++) {
				$day = date("Y-m-d", strtotime('+' . $i . 'days', strtotime($dayLeft)));
				array_push($allDays, $day);
			}

			$allData = array();
			for ($i = 0; $i < count($allDays); $i++) {
				$data = $this->Mteemarket->getDataByTime($allDays[$i], $_SESSION['user']['id']);
				array_push($allData, $data);
			}

			for ($i = 0; $i < count($allData); $i++) {
				if ($allData[$i] != array()) {
					$unit = 0;
					$profit = 0;
					for ($k = 0; $k < count($allData[$i]); $k++) {
						$unit += $allData[$i][$k]["quantity"];
						$profit += ($allData[$i][$k]["quantity"] * $allData[$i][$k]["price"]);
					}
					array_push($allData[$i], $unit);
					array_push($allData[$i], $profit);
				}
			}

			for ($i = 0; $i < count($allDays); $i++) {
				$orders = $this->Mteemarket->getOrdersByTime($allDays[$i], $_SESSION['user']['id']);
				array_push($allData[$i], $orders[0]);
			}

			$campaignActive = count($this->Mteemarket->getCampaignActive($_SESSION['user']['id']));
			$campaignEnded = count($this->Mteemarket->getCampaignEnded($_SESSION['user']['id']));
			array_push($allData, $campaignActive);
			array_push($allData, $campaignEnded);

			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function get_orders_all_time(){
		if ($this->input->post('code')) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$date = date("Y-m-d");

			$allIdCustomer = $this->Mteemarket->getAllIdCustomer($_SESSION['user']['id']);
			$allTime = [];
			for ($i = 0; $i < count($allIdCustomer); $i++) {
				$time = $this->Mteemarket->getAllDay($allIdCustomer[$i]['id']);
				array_push($allTime, $time);
			}

			//Format date lay duoc
			for ($i = 0; $i < count($allTime); $i++) {
				$day[$i] = date("Y-m-d", strtotime($allTime[$i][0]['time']));
			}

			$allDays = array_unique($day);
			array_push($allDays, $date);//Push today to allDays
			$resultDays = array_values(array_unique($allDays));

			$allData = array();
			for ($i = 0; $i < count($resultDays); $i++) {
				$data = $this->Mteemarket->getDataByTime($resultDays[$i], $_SESSION['user']['id']);
				array_push($allData, $data);
			}

			for ($i = 0; $i < count($allData); $i++) {
				if ($allData[$i] != array()) {
					$unit = 0;
					$profit = 0;
					for ($k = 0; $k < count($allData[$i]); $k++) {
						$unit += $allData[$i][$k]["quantity"];
						$profit += ($allData[$i][$k]["quantity"] * $allData[$i][$k]["price"]);
					}
					array_push($allData[$i], $unit);
					array_push($allData[$i], $profit);
				}
			}

			for ($i = 0; $i < count($resultDays); $i++) {
				array_push($allData[$i], $resultDays[$i]);
			}

			for ($i = 0; $i < count($resultDays); $i++) {
				$orders = $this->Mteemarket->getOrdersByTime($resultDays[$i], $_SESSION['user']['id']);
				array_push($allData[$i], $orders[0]);
			}

			$campaignActive = count($this->Mteemarket->getCampaignActive($_SESSION['user']['id']));
			$campaignEnded = count($this->Mteemarket->getCampaignEnded($_SESSION['user']['id']));
			array_push($allData, $campaignActive);
			array_push($allData, $campaignEnded);


			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function get_orders_custom_day(){
		if ($this->input->post('dateStart') || $this->input->post('dateEnd')){
			$dateStart = $this->input->post('dateStart');
			$dateEnd = $this->input->post('dateEnd');
			$arrayDay = array();
			array_push($arrayDay,$dateStart);
			array_push($arrayDay,$dateEnd);

			$date1=date_create($arrayDay[0]);
			$date2=date_create($arrayDay[1]);
			$diff=date_diff($date1,$date2);
			$range =  $diff->format("%a");

			$allDays = array();
			for ($i = 0; $i <= $range; $i++) {
				$day = date("Y-m-d", strtotime('+' . $i . 'days', strtotime($dateStart)));
				array_push($allDays, $day);
			}

			$allData = array();
			for ($i = 0; $i < count($allDays); $i++) {
				$data = $this->Mteemarket->getDataByTime($allDays[$i], $_SESSION['user']['id']);
				array_push($allData, $data);
			}

			for ($i = 0; $i < count($allData); $i++) {
				if ($allData[$i] != array()) {
					$unit = 0;
					$profit = 0;
					for ($k = 0; $k < count($allData[$i]); $k++) {
						$unit += $allData[$i][$k]["quantity"];
						$profit += ($allData[$i][$k]["quantity"] * $allData[$i][$k]["price"]);
					}
					array_push($allData[$i], $unit);
					array_push($allData[$i], $profit);
				}
			}

			for ($i = 0; $i < count($allDays); $i++) {
				array_push($allData[$i], $allDays[$i]);
			}

			for ($i = 0; $i < count($allDays); $i++) {
				$orders = $this->Mteemarket->getOrdersByTime($allDays[$i], $_SESSION['user']['id']);
				array_push($allData[$i], $orders[0]);
			}

			$campaignActive = count($this->Mteemarket->getCampaignActive($_SESSION['user']['id']));
			$campaignEnded = count($this->Mteemarket->getCampaignEnded($_SESSION['user']['id']));
			array_push($allData, $campaignActive);
			array_push($allData, $campaignEnded);

			echo json_encode($allData);
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}

	}

	public function campaigns(){
		if (empty($_SESSION['user'])) {
			redirect('http://localhost:8012/teemarket/login');
		} else {
			$allCampaigns = $this->Mteemarket->getAllCampaignsOfSeller($_SESSION['user']['id']);

			$arrayOrdersOfCampaign = array();
			for ($i = 0; $i <count($allCampaigns); $i++){
				$ordersOfCampaign = $this->Mteemarket->getAllOrdersOfCampaign($allCampaigns[$i]['id']);
				array_push($arrayOrdersOfCampaign,$ordersOfCampaign);
			}

			$arrayUnitsOfCampaign = array();
			for ($i = 0; $i < count($allCampaigns); $i++){
				$unitsOfCampaign = $this->Mteemarket->getAllUnitsOfCampaign($allCampaigns[$i]['id']);
				array_push($arrayUnitsOfCampaign,$unitsOfCampaign);
			}

			$arrayUnits = array();
			for ($i = 0; $i < count($arrayUnitsOfCampaign); $i++){
				$units = 0;
				for ($k = 0; $k < count($arrayUnitsOfCampaign[$i]); $k++){
					$units += $arrayUnitsOfCampaign[$i][$k]['quantity'];
				}
				array_push($arrayUnits,$units);
			}

			$allData = array();
			for ($i = 0; $i < count($allCampaigns); $i++){
				$firstImageLink = $this->Mteemarket->getFirstImageLinkByIdCampaign($allCampaigns[$i]['id']);
				$data = ['id' => $allCampaigns[$i]['id'], 'image_link' => $firstImageLink, 'orders' => $arrayOrdersOfCampaign[$i][0]['COUNT(DISTINCT id_customer)'], 'units' => $arrayUnits[$i],'price' => $allCampaigns[$i]['price'], 'url' => $allCampaigns[$i]['url'], 'title' => $allCampaigns[$i]['title'], 'publicname' => $allCampaigns[$i]['publicname'], 'status' => $allCampaigns[$i]['status']];
				array_push($allData, $data);
			}

			$this->load->view('campaigns_view',['campaigns' => $allData]);
		}
	}

	public function campaign_details($id_campaign){
		if (empty($_SESSION['user'])) {
			redirect('http://localhost:8012/teemarket/login');
		} else {
			$dataCampaign = $this->Mteemarket->getDataCampaignById($id_campaign,$_SESSION['user']['id']);

			if ($dataCampaign) {
				$dataCategory = $this->Mteemarket->getDataCategory();
				$firstImageLink = $this->Mteemarket->getFirstImageLinkByIdCampaign($id_campaign);
				$this->load->view('campaign_details_view',['category' => $dataCategory,'campaign' => $dataCampaign,'image_link' => $firstImageLink]);
			} else {
				redirect('http://localhost:8012/teemarket/error');
			}
		}
	}

	public function update_campaign(){
		if ($this->input->post('id')){
			$id = $this->input->post('id');
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$category = $this->input->post('category');

			$update = $this->Mteemarket->updateCampaign($id,$title,$description,$category);
			if ($update){
				echo 0;
			} else {
				echo "Update error";
			}
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function end_campaign(){
		if ($this->input->post('id')){
			$id = $this->input->post('id');

			$end = $this->Mteemarket->endCampaign($id);
			if ($end){
				echo 0;
			} else {
				echo "End error";
			}
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function design()
	{
		if (empty($_SESSION['user'])) {
			redirect('http://localhost:8012/teemarket/login');
		} else {
			$data_color = $this->Mteemarket->getDataColor();
			$this->load->view('design_view',['colors' => $data_color]);
		}
	}

	public function get_all_color()
	{
		if ($this->input->post('code')){
			$data_color = $this->Mteemarket->getDataColor();
			echo json_encode($data_color);
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function get_color_code()
	{
		if ($this->input->post('myColor')){
			$myColor = $this->input->post('myColor');
			$rgb = $this->Mteemarket->getRgbByColorName($myColor);
			echo json_encode($rgb);
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function get_design(){
		if ($this->input->post('src_image')){
			$src_image = $this->input->post('src_image');
			$color_design = $this->input->post('color_design');

			$colors= array();
			array_push($colors, $color_design);

			$_SESSION['campaign']['src_image'] = $src_image;
			$_SESSION['campaign']['color'] = $colors;
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function remove_design(){
		if (empty($_SESSION['user'])) {
			redirect('http://localhost:8012/teemarket/login');
		} else {
			unset($_SESSION['campaign']);
			redirect('http://localhost:8012/teemarket/seller/design');
		}
	}

	public function product()
	{
		if (empty($_SESSION['campaign']['src_image']) || empty($_SESSION['campaign']['color'])) {
			redirect('http://localhost:8012/teemarket/seller/design');
		} else {
			$data_color = $this->Mteemarket->getDataColor();
			$this->load->view('product_view',['colors' => $data_color]);
		}
	}

	public function get_product(){
		if ($this->input->post('price')){
			$_SESSION['campaign']['resultColors'] = $this->input->post('resultColors');
			$_SESSION['campaign']['price'] = $this->input->post('price');
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function launch()
	{
		if (empty($_SESSION['campaign']['resultColors']) || empty($_SESSION['campaign']['price'])) {
			redirect('http://localhost:8012/teemarket/seller/design');
		} else {
			$dataCategory = $this->Mteemarket->getDataCategory();
			$this->load->view('launch_view',['category' => $dataCategory]);
		}
	}

	public function check_url(){
		if ($this->input->post('url')){
			$url = $this->input->post('url');
			$data = $this->Mteemarket->getIdCampByIdSellerAndUrl($_SESSION['user']['id'],$url);
			if (!$data) {
				$status = 0;
				echo $status;
			} else {
				$status = 1;
				echo $status;
			}
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function get_launch(){
		if ($this->input->post('url')){
			require "vendor/autoload.php";
			require "config-cloud.php";

			$firstColorDesign = $this->Mteemarket->getDataColorByColorCode($_SESSION['campaign']['color'][0]);
			$arrayIdColor = array(
				array(
					array(
						"id" => $firstColorDesign[0]['id']
					)
				)
			);
			$arrayMockup = array(
				array(
					array(
						"mockup" => $firstColorDesign[0]['mockup']
					)
				)
			);
			$array_str = explode("/",$_SESSION['campaign']['src_image']);
			$image_id= substr($array_str[7],0,-4); //design k doi
			$image_link = 'https://res.cloudinary.com/teemarket/image/upload/c_scale,l_' . $image_id . ',w_216,y_-16/' . $arrayMockup[0][0]['mockup'];
			$arrayImageLink = array(
				array(
					$image_link
				)

			);

			for ($i = 0; $i < count($_SESSION['campaign']['resultColors']); $i++){
				if($_SESSION['campaign']['resultColors'][$i] != $_SESSION['campaign']['color'][0]){
					$dataIdColor = $this->Mteemarket->getIdColorByColorCode($_SESSION['campaign']['resultColors'][$i]);
					$dataMockup = $this->Mteemarket->getMockupByColorCode($_SESSION['campaign']['resultColors'][$i]);
					array_push($arrayIdColor,$dataIdColor);
					array_push($arrayMockup,$dataMockup);
				}
			}

			for ($i = 1; $i < count($arrayMockup); $i++){
				$dataImageLink = array('https://res.cloudinary.com/teemarket/image/upload/c_scale,l_' . $image_id . ',w_216,y_-16/' . $arrayMockup[$i][0]['mockup']);
				array_push($arrayImageLink,$dataImageLink);
			}

			$_SESSION['campaign']['title'] = $this->input->post('title');
			$_SESSION['campaign']['description'] = $this->input->post('description');
			$_SESSION['campaign']['url'] = $this->input->post('url');
			$_SESSION['campaign']['category'] = $this->input->post('category');

			$addCamp = $this->Mteemarket->insertCampaign($_SESSION['user']['id'],$_SESSION['campaign']['src_image'],$_SESSION['campaign']['price'],$_SESSION['campaign']['title'],$_SESSION['campaign']['description'],$_SESSION['campaign']['url'],$_SESSION['campaign']['category']);

			if ($addCamp) {
				$idCamp = $this->Mteemarket->getIdCampByIdSellerAndUrl($_SESSION['user']['id'],$_SESSION['campaign']['url']);
				if ($idCamp) {
					$secure_url = array();
					for ($i = 0; $i < count($arrayImageLink); $i++){
						$upLoad = \Cloudinary\Uploader::upload($arrayImageLink[$i][0]);
						$temp_secure_url = $upLoad["secure_url"];
						array_push($secure_url,$temp_secure_url);
					}
					//Insert Campaign Colors
					for ($i = 0; $i < count($arrayIdColor); $i++){
						$addCampColors = $this->Mteemarket->insertCampColors($idCamp[0]['id'],$arrayIdColor[$i][0]['id'],$secure_url[$i]);
					}
					unset($_SESSION['campaign']);
					echo json_encode($idCamp[0]['id']);
				} else {
					$status = 1;
					echo $status;
				}
			} else {
				$status = 2;
				echo $status;
			}
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function orders()
	{
		if (empty($_SESSION['user'])) {
			redirect('http://localhost:8012/teemarket/login');
		} else {
			$orders = $this->Mteemarket->getOrdersByIdSeller($_SESSION['user']['id']);
			$this->load->view('orders_view',['orders' => $orders]);
		}
	}

	public function account()
	{
		if (empty($_SESSION['user'])) {
			redirect('http://localhost:8012/teemarket/login');
		} else {
			$infoSeller = $this->Mteemarket->getInfoSeller($_SESSION['user']['id']);
			$this->load->view('account_view',['info' => $infoSeller]);
		}
	}

	public function update_info(){
		if ($this->input->post('publicname')){
			$fullname = $this->input->post('fullname');
			$publicname = $this->input->post('publicname');
			$address = $this->input->post('address');
			$countries = $this->input->post('countries');
			$states = $this->input->post('states');
			$cities = $this->input->post('cities');
			$zip = $this->input->post('zip');
			$phone = $this->input->post('phone');

			$update = $this->Mteemarket->updateInfo($_SESSION['user']['id'],$fullname,$publicname,$address,$countries,$states,$cities,$zip,$phone);

			if ($update) {
				$status = 0;
				echo $status;
			} else {
				$status = 1;
				echo $status;
			}
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function change_password()
	{
		if ($this->input->post('current_pass')){
			$id = $_SESSION['user']['id'];
			$current_pass = $this->input->post('current_pass');
			$new_pass = $this->input->post('new_pass');

			$data = $this->Mteemarket->getPassByIdAccount($id);

			if ($current_pass == $data[0]['password']){
				$update = $this->Mteemarket->updatePassword($id, $new_pass);
				if ($update) {
					$status = 0;
					echo $status;
				} else {
					$status = 1;
					echo $status;
				}
			} else {
				$status = 2;
				echo $status;
			}
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function payment()
	{
		if (empty($_SESSION['user'])) {
			redirect('http://localhost:8012/teemarket/login');
		} else {
			$dataPaymentOfSeller = $this->Mteemarket->getDataPaymentByIdSeller($_SESSION['user']['id']);
			$this->load->view('payment_view',['payment' => $dataPaymentOfSeller]);
		}
	}

	public function insert_payment(){
		if ($this->input->post('paypal') || $this->input->post('payoneer')) {
			$paypal = $this->input->post('paypal');
			$payoneer = $this->input->post('payoneer');

			$dataPaymentOfSeller = $this->Mteemarket->getDataPaymentByIdSeller($_SESSION['user']['id']);
			if ($dataPaymentOfSeller) {
				$update = $this->Mteemarket->updatePayment($_SESSION['user']['id'],$paypal,$payoneer);
				if ($update) {
					echo 0;
				} else {
					echo 1;
				}
			} else {
				$add = $this->Mteemarket->insertPayment($_SESSION['user']['id'],$paypal,$payoneer);
				if ($add) {
					echo 0;
				} else {
					echo 1;
				}
			}
		} else {
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function payouts()
	{
		if (empty($_SESSION['user'])) {
			redirect('http://localhost:8012/teemarket/login');
		} else {
			$available = $this->Mteemarket->getPayoutsAvailableByIdSeller($_SESSION['user']['id']);
			$payoutsAvailable = 0;
			for ($i = 0; $i <count($available); $i++){
				$payoutsAvailable += $available[$i]['quantity']*($available[$i]['price']-7.50);
			}

			$requested = $this->Mteemarket->getPayoutsRequestedByIdSeller($_SESSION['user']['id']);
			$payoutsRequested = 0;
			for ($i = 0; $i<count($requested); $i++){
				$payoutsRequested += $requested[$i]['payout_requested'];
			}

			$paid = $this->Mteemarket->getTotalPaidByIdSeller($_SESSION['user']['id']);
			$totalPaid = 0;
			for ($i = 0; $i<count($paid); $i++){
				$totalPaid += $paid[$i]['payout_requested'];
			}

			$this->load->view('payouts_view',['payoutsAvailable' => $payoutsAvailable, 'payoutsRequested' => $payoutsRequested, 'totalPaid' => $totalPaid]);
		}
	}

	public function get_payouts_available(){
		if ($this->input->post('code')) {
			$campaignsPayouts = $this->Mteemarket->getCampaignsPayoutsByIdSeller($_SESSION['user']['id']);

			echo json_encode($campaignsPayouts);
		} else {
			redirect('http://localhost:8012/teemarket/error');

		}
	}

	public function get_payouts_requested(){
		if ($this->input->post('code')) {
			$campaignsPayoutsRequested = $this->Mteemarket->getCampaignsPayoutsRequestedByIdSeller($_SESSION['user']['id']);

			echo json_encode($campaignsPayoutsRequested);
		} else {
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function check_payment_method(){
		if ($this->input->post('code')) {
			$payment = $this->Mteemarket->getPaymentByIdSeller($_SESSION['user']['id']);

			if (!empty($payment[0]['paypal']) || !empty($payment[0]['payoneer'])) {
				echo json_encode($payment);
			} else {
				echo 0;
			}
		} else {
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function insert_request(){
		if ($this->input->post('request')) {
			$request = $this->input->post('request');
			$payment_mode = $this->input->post('payment_mode');
			$request_time = $this->input->post('request_time');

			$add = $this->Mteemarket->insertPayouts($_SESSION['user']['id'],$request,$payment_mode,$request_time);
			if ($add){
				$ordersPending = $this->Mteemarket->getPayoutsAvailableByIdSeller($_SESSION['user']['id']);
				for ($i = 0; $i < count($ordersPending); $i++){
					$updateStatusOrders = $this->Mteemarket->updateStatusOrders($ordersPending[$i]['id']);
				}
				echo 1;
			} else {
				echo 0;
			}
		} else {
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function logout()
	{
		// Xóa session name
		unset($_SESSION['user']);
		unset($_SESSION['campaign']);
		unset($_SESSION['admin']);
		redirect('http://localhost:8012/teemarket');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
