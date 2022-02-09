<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Mvhht');
	}

	public function index()
	{
		redirect('http://localhost:8012/vhht/admin/dashboard');
	}

	public function dashboard()
	{
		$this->load->view('admin_dashboard_view_backup');
//		if (empty($_SESSION['admin'])) {
//			redirect('http://localhost:8012/vhht/admin/login');
//		} else {
//			$this->load->view('admin_dashboard_view_backup');
//		}
	}

	public function problem()
	{
		$this->load->view('problem_view');
	}

	public function get_orders_today(){
		if ($this->input->post('code')) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$date = date("Y-m-d");
			$allData = array();

			for ($i = 0; $i < 24; $i++) {
				if ($i < 10) {
					$data1 = $this->Mvhht->adminGetDataByTime($date . ' 0' . $i);
					array_push($allData, $data1);
				} else {
					$data2 = $this->Mvhht->adminGetDataByTime($date . ' ' . $i);
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
					$orders1 = $this->Mvhht->adminGetOrdersByTime($date . ' 0' . $i);
					array_push($allData[$i], $orders1[0]);
				} else {
					$orders2 = $this->Mvhht->adminGetOrdersByTime($date . ' ' . $i);
					array_push($allData[$i], $orders2[0]);
				}
			}

			$campaignActive = count($this->Mvhht->adminGetCampaignActive());
			$campaignEnded = count($this->Mvhht->adminGetCampaignEnded());
			array_push($allData, $campaignActive);
			array_push($allData, $campaignEnded);

			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/vhht/error');
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
					$data1 = $this->Mvhht->adminGetDataByTime($yesterday . ' 0' . $i);
					array_push($allData, $data1);
				} else {
					$data2 = $this->Mvhht->adminGetDataByTime($yesterday . ' ' . $i);
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
					$orders1 = $this->Mvhht->adminGetOrdersByTime($yesterday . ' 0' . $i);
					array_push($allData[$i], $orders1[0]);
				} else {
					$orders2 = $this->Mvhht->adminGetOrdersByTime($yesterday . ' ' . $i);
					array_push($allData[$i], $orders2[0]);
				}
			}

			$campaignActive = count($this->Mvhht->adminGetCampaignActive());
			$campaignEnded = count($this->Mvhht->adminGetCampaignEnded());
			array_push($allData, $campaignActive);
			array_push($allData, $campaignEnded);

			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/vhht/error');
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
				$data = $this->Mvhht->adminGetDataByTime($allDays[$i]);
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
				$orders = $this->Mvhht->adminGetOrdersByTime($allDays[$i]);
				array_push($allData[$i], $orders[0]);
			}

			$campaignActive = count($this->Mvhht->adminGetCampaignActive());
			$campaignEnded = count($this->Mvhht->adminGetCampaignEnded());
			array_push($allData, $campaignActive);
			array_push($allData, $campaignEnded);

			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/vhht/error');
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
				$data = $this->Mvhht->adminGetDataByTime($allDays[$i]);
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
				$orders = $this->Mvhht->adminGetOrdersByTime($allDays[$i]);
				array_push($allData[$i], $orders[0]);
			}

			$campaignActive = count($this->Mvhht->adminGetCampaignActive());
			$campaignEnded = count($this->Mvhht->adminGetCampaignEnded());
			array_push($allData, $campaignActive);
			array_push($allData, $campaignEnded);

			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/vhht/error');
		}
	}

	public function get_orders_all_time(){
		if ($this->input->post('code')) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$date = date("Y-m-d");

			$allIdCustomer = $this->Mvhht->adminGetAllIdCustomer();
			$allTime = [];
			for ($i = 0; $i < count($allIdCustomer); $i++) {
				$time = $this->Mvhht->getAllDay($allIdCustomer[$i]['id']);
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
				$data = $this->Mvhht->adminGetDataByTime($resultDays[$i]);
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
				$orders = $this->Mvhht->adminGetOrdersByTime($resultDays[$i]);
				array_push($allData[$i], $orders[0]);
			}

			$campaignActive = count($this->Mvhht->adminGetCampaignActive());
			$campaignEnded = count($this->Mvhht->adminGetCampaignEnded());
			array_push($allData, $campaignActive);
			array_push($allData, $campaignEnded);


			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/vhht/error');
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
				$data = $this->Mvhht->adminGetDataByTime($allDays[$i]);
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
				$orders = $this->Mvhht->adminGetOrdersByTime($allDays[$i]);
				array_push($allData[$i], $orders[0]);
			}

			$campaignActive = count($this->Mvhht->adminGetCampaignActive());
			$campaignEnded = count($this->Mvhht->adminGetCampaignEnded());
			array_push($allData, $campaignActive);
			array_push($allData, $campaignEnded);

			echo json_encode($allData);
		} else{
			redirect('http://localhost:8012/vhht/error');
		}

	}

	public function login()
	{
		$this->load->view('admin_login_view');
	}

	public function check_sign_in()
	{
		if ($this->input->post('emailSignIn')) {
			$emailSignIn = $this->input->post('emailSignIn');
			$passwordSignIn = $this->input->post('passwordSignIn');

			$data = $this->Mvhht->getDataSellerSignIn($emailSignIn, $passwordSignIn);

			if ($data) {
				$status = 0;
				echo $status;
				$admin_info = array(
					'id' => $data[0]['id'],
					'publicname' => $data[0]['publicname'],
					'fullname' => $data[0]['fullname'],
					'email' => $data[0]['email'],
				);
				$this->session->set_userdata('admin', $admin_info);
				$this->session->set_userdata('user', $admin_info);
			} else {
				$status = 1;
				echo $status;
			}
		} else {
			redirect('http://localhost:8012/vhht/error');
		}
	}

	public function campaigns(){
		if (empty($_SESSION['admin'])) {
			redirect('http://localhost:8012/vhht/admin/login');
		} else {
			$allCampaigns = $this->Mvhht->getAllCampaigns();

			$arrayOrdersOfCampaign = array();
			for ($i = 0; $i <count($allCampaigns); $i++){
				$ordersOfCampaign = $this->Mvhht->getAllOrdersOfCampaign($allCampaigns[$i]['id']);
				array_push($arrayOrdersOfCampaign,$ordersOfCampaign);
			}

			$arrayUnitsOfCampaign = array();
			for ($i = 0; $i < count($allCampaigns); $i++){
				$unitsOfCampaign = $this->Mvhht->getAllUnitsOfCampaign($allCampaigns[$i]['id']);
				array_push($arrayUnitsOfCampaign,$unitsOfCampaign);
			}

			$arrayUnits = array();//Tinh units cua campaign
			for ($i = 0; $i < count($arrayUnitsOfCampaign); $i++){
				$units = 0;
				for ($k = 0; $k < count($arrayUnitsOfCampaign[$i]); $k++){
					$units += $arrayUnitsOfCampaign[$i][$k]['quantity'];
				}
				array_push($arrayUnits,$units);
			}

			$allData = array();
			for ($i = 0; $i < count($allCampaigns); $i++){
				$firstImageLink = $this->Mvhht->getFirstImageLinkByIdCampaign($allCampaigns[$i]['id']);
				$data = ['id' => $allCampaigns[$i]['id'], 'image_link' => $firstImageLink, 'orders' => $arrayOrdersOfCampaign[$i][0]['COUNT(DISTINCT id_customer)'], 'units' => $arrayUnits[$i],'price' => $allCampaigns[$i]['price'], 'url' => $allCampaigns[$i]['url'], 'title' => $allCampaigns[$i]['title'], 'publicname' => $allCampaigns[$i]['publicname'], 'status' => $allCampaigns[$i]['status']];
				array_push($allData, $data);
			}

			$this->load->view('admin_campaigns_view',['campaigns' => $allData]);
		}
	}

	public function campaign_details($id_campaign){
		if (empty($_SESSION['admin'])) {
			redirect('http://localhost:8012/vhht/admin/login');
		} else {
			$dataCampaign = $this->Mvhht->adminGetDataCampaignById($id_campaign);

			if ($dataCampaign) {
				$dataCategory = $this->Mvhht->getDataCategory();
				$firstImageLink = $this->Mvhht->getFirstImageLinkByIdCampaign($id_campaign);
				$this->load->view('admin_campaign_details_view',['category' => $dataCategory,'campaign' => $dataCampaign,'image_link' => $firstImageLink]);
			} else {
				redirect('http://localhost:8012/vhht/error');
			}
		}
	}

	public function mockups(){
		if (empty($_SESSION['admin'])) {
			redirect('http://localhost:8012/vhht/admin/login');
		} else {
			$mockups = $this->Mvhht->getMockups();
			$this->load->view('admin_mockups_view',['mockups' => $mockups]);
		}
	}

	public function create_mockup(){
		if ($this->input->post('color_name')) {
			$color_name = $this->input->post('color_name');
			$color_code = $this->input->post('color_code');
			$src_image = $this->input->post('src_image');

			//Convert color_code Hex to rgb
			function hex2rgb( $colour ) {
				if ( $colour[0] == '#' ) {
					$colour = substr( $colour, 1 );
				}
				if ( strlen( $colour ) == 6 ) {
					list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
				} elseif ( strlen( $colour ) == 3 ) {
					list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
				} else {
					return false;
				}
				$r = hexdec( $r );
				$g = hexdec( $g );
				$b = hexdec( $b );

				return 'rgb('.$r.', '.$g.', '.$b.')';
			}

			$color_code_rgb = hex2rgb($color_code);

			//lay duoi mockup bo di .png hoac .jpg
			$array_str = explode("/",$src_image);
			$fisrt_str = substr($array_str[6],0);
			$second_str = substr($array_str[7],0);
			$mockup = $fisrt_str . '/' . $second_str;

			$insert = $this->Mvhht->insertMockup($color_name,$color_code_rgb,$mockup);
			if ($insert){
				echo 1;
			} else {
				echo 0;
			}
		} else {
			redirect('http://localhost:8012/vhht/error');
		}
	}

	public function update_mockup(){
		if ($this->input->post('color_id')) {
			$color_id = $this->input->post('color_id');
			$color_name = $this->input->post('color_name');
			$color_code = $this->input->post('color_code');

			//Convert color_code Hex to rgb
			function hex2rgb( $colour ) {
				if ( $colour[0] == '#' ) {
					$colour = substr( $colour, 1 );
				}
				if ( strlen( $colour ) == 6 ) {
					list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
				} elseif ( strlen( $colour ) == 3 ) {
					list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
				} else {
					return false;
				}
				$r = hexdec( $r );
				$g = hexdec( $g );
				$b = hexdec( $b );

				return 'rgb('.$r.', '.$g.', '.$b.')';
			}

			$color_code_rgb = hex2rgb($color_code);

			$update = $this->Mvhht->updateMockup($color_id,$color_name,$color_code_rgb);
			if ($update){
				echo 1;
			} else {
				echo 0;
			}
		} else {
			redirect('http://localhost:8012/vhht/error');
		}
	}

	public function delete_mockup(){
		if ($this->input->post('id')) {
			$id = $this->input->post('id');
			$checkOrdersByIdColor = $this->Mvhht->checkOrdersByIdColor($id);
			if ($checkOrdersByIdColor){
				echo 1;
			} else {
				$deleteCampaignColor = $this->Mvhht->deleteCampaignColor($id);
				$delete = $this->Mvhht->deleteMockup($id);
				echo 0;
			}
		} else {
			redirect('http://localhost:8012/vhht/error');
		}
	}

	public function categories(){
		if (empty($_SESSION['admin'])) {
			redirect('http://localhost:8012/vhht/admin/login');
		} else {
			$categories = $this->Mvhht->getDataCategory();
			$this->load->view('admin_categories_view',['categories' => $categories]);
		}

	}

	public function create_category(){
		if ($this->input->post('category_name')) {
			$category_name = $this->input->post('category_name');

			$insert = $this->Mvhht->insertCategory($category_name);
			if ($insert){
				echo 1;
			} else {
				echo 0;
			}
		} else {
			redirect('http://localhost:8012/vhht/error');
		}
	}

	public function update_category(){
		if ($this->input->post('category_id')) {
			$category_id = $this->input->post('category_id');
			$category_name = $this->input->post('category_name');

			$update = $this->Mvhht->updateCategory($category_id,$category_name);
			if ($update){
				echo 1;
			} else {
				echo 0;
			}
		} else {
			redirect('http://localhost:8012/vhht/error');
		}
	}

	public function delete_category(){
		if ($this->input->post('id')) {
			$id = $this->input->post('id');
			$updateCampaignCategory = $this->Mvhht->updateCampaignCategory($id);
			if ($updateCampaignCategory) {
				$delete = $this->Mvhht->deleteCategory($id);
				echo 1;
			}
		} else {
			redirect('http://localhost:8012/vhht/error');
		}
	}

	public function orders(){
		if (empty($_SESSION['admin'])) {
			redirect('http://localhost:8012/vhht/admin/login');
		} else {
			$orders = $this->Mvhht->getOrders();
			$this->load->view('admin_orders_view',['orders' => $orders]);
		}
	}

	public function update_order(){
		if ($this->input->post('order_id')) {
			$order_id = $this->input->post('order_id');
			$status = $this->input->post('status');
			$update = $this->Mvhht->updateOrder($order_id,$status);
			if ($update){
				echo 1;
			} else {
				echo 0;
			}
		} else {
			redirect('http://localhost:8012/vhht/error');
		}
	}

	public function users(){
		if (empty($_SESSION['admin'])) {
			redirect('http://localhost:8012/vhht/admin/login');
		} else {
			$users = $this->Mvhht->getUsers();

			for ($i = 0; $i < count($users); $i++){
				$checkRequestOfUser = $this->Mvhht->checkRequestOfUser($users[$i]['id']);
				array_push($users[$i],$checkRequestOfUser);
			}
			$this->load->view('admin_users_view',['users'=>$users]);
		}
	}

	public function user_details($id_user){
		if (empty($_SESSION['admin'])) {
			redirect('http://localhost:8012/vhht/admin/login');
		} else {
			$dataRequested = $this->Mvhht->getDateRequestedOfUser($id_user);
			for ($i = 0; $i < count($dataRequested); $i++){
				$payment_method = $this->Mvhht->getPaymentMethodByIdPayout($id_user,$dataRequested[$i]['payment_mode']);
				array_push($dataRequested[$i],$payment_method);
			}
			$this->load->view('admin_user_details_view',['dataRequested' => $dataRequested,'id_user'=>$id_user]);
		}
	}

	public function get_requestes_of_seller(){
		if ($this->input->post('id_user')) {
			$id_user = $this->input->post('id_user');
			$dataRequested = $this->Mvhht->getDateRequestedOfUser($id_user);
			for ($i = 0; $i < count($dataRequested); $i++){
				$payment_method = $this->Mvhht->getPaymentMethodByIdPayout($id_user,$dataRequested[$i]['payment_mode']);
				if ($dataRequested[$i]['payment_mode'] == 'paypal'){
					array_push($dataRequested[$i],$payment_method[0]['paypal']);
				} else {
					array_push($dataRequested[$i],$payment_method[0]['payoneer']);
				}
			}

			echo json_encode($dataRequested);
		} else {
			redirect('http://localhost:8012/vhht/error');
		}
	}

	public function get_orders_of_seller(){
		if ($this->input->post('id_user')) {
			$id_user = $this->input->post('id_user');
			$ordersOfSeller = $this->Mvhht->getOrdersByIdSeller($id_user);

			echo json_encode($ordersOfSeller);
		} else {
			redirect('http://localhost:8012/vhht/error');
		}
	}

	public function pay(){
		if ($this->input->post('id')) {
			$id = $this->input->post('id');
			$pay_time = $this->input->post('pay_time');

			$update = $this->Mvhht->updatePayout($id,$pay_time);
			if ($update){
				echo 1;
			} else {
				echo 0;
			}
		} else {
			redirect('http://localhost:8012/vhht/error');
		}
	}

	public function logout()
	{
		unset($_SESSION['admin']);
		unset($_SESSION['user']);
		redirect('http://localhost:8012/vhht');
	}
}
