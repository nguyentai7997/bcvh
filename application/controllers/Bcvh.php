<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bcvh extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Mbcvh');
	}

	public function index()
	{
		redirect('http://localhost:8012/bcvh/dashboard');
	}

	public function dashboard()
	{
		if (empty($_SESSION['user'])) {
			redirect('http://localhost:8012/bcvh/login');
		} else {
			$this->load->view('dashboard_view');
		}
	}

	public function login()
	{
		$this->load->view('login_view');
	}

	public function check_sign_in()
	{
		if ($this->input->post('usernameSignIn')){
			$usernameSignIn = $this->input->post('usernameSignIn');
			$passwordSignIn = $this->input->post('passwordSignIn');

			$data = $this->Mbcvh->getDataSignIn($usernameSignIn, $passwordSignIn);

			if ($data) {
				$status = 0;
				echo $status;
				$user_info = array(
					'id_user' => $data[0]['id_user'],
					'username' => $data[0]['username'],
					'role' => $data[0]['role'],
				);
				$this->session->set_userdata('user', $user_info);
			} else {
				$status = 1;
				echo $status;
			}
		} else{
			redirect('http://localhost:8012/bcvh/error');
		}
	}

	public function getEvents()
	{
		if ($this->input->post('code')) {
			//Check role hien thi event theo user role 3
			if ($_SESSION['user']['role'] == 3){
				$idUser = $_SESSION['user']['id_user'];//Lay id theo Session user
				$events = $this->Mbcvh->getDataProblemByIdUser($idUser);
				echo json_encode($events);
			} else {
				$events = $this->Mbcvh->getAllDataProblem();
				echo json_encode($events);
			}
		} else {
			redirect('http://localhost:8012/bcvh/error');
		}
	}

	public function viewEvent()
	{
		if ($this->input->post('idEvent')) {
			$idEvent = $this->input->post('idEvent');
			$events = $this->Mbcvh->getDataProblemByIdProblem($idEvent);
			echo json_encode($events);
		} else {
			redirect('http://localhost:8012/bcvh/error');
		}
	}

	public function problem()
	{
		//Check role hien thi event theo user role 3
		if ($_SESSION['user']['role'] == 3){
			$idUser = $_SESSION['user']['id_user'];//Lay id theo Session user
			$dataProblem = $this->Mbcvh->getDataProblemByIdUser($idUser);
			$dataSoftware = $this->Mbcvh->getSoftwareByIdUser($idUser);
			$this->load->view('problem_view',['dataProblem' => $dataProblem,'dataSoftware' => $dataSoftware]);
		} else {
			$dataProblem = $this->Mbcvh->getAllDataProblem();
			$dataSoftware = $this->Mbcvh->getAllSoftware();
			$this->load->view('problem_view',['dataProblem' => $dataProblem,'dataSoftware' => $dataSoftware]);
		}
	}

	public function pagination_problem()
	{
		if ($this->input->post('pageNumber')){
			$pageNumber = $this->input->post('pageNumber');
			$limit = 10;//số lượng bản ghi
			$offset=($pageNumber - 1) * $limit; //vị trí bắt đầu lấy dữ liệu
			$dataProblemOffSet = $this->Mbcvh->getDataProblemByOffset($offset,$limit);

			$allData = array();
			for ($i = 0; $i < count($dataProblemOffSet); $i++) {
				$dataPublicname = $this->Mteemarket->getPublicnameByIdCamp($dataCampOffSet[$i]['id']);
				$firstImageLinkOfCampaign = $this->Mteemarket->getFirstImageLinkByIdCampaign($dataCampOffSet[$i]['id']);
				$data = ['image_link' => $firstImageLinkOfCampaign, 'price' => $dataCampOffSet[$i]['price'], 'url' => $dataCampOffSet[$i]['url'], 'title' => $dataCampOffSet[$i]['title'], 'publicname' => $dataPublicname[0]['publicname']];
				array_push($allData, $data);
			}
			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function search_result()
	{
		if (!isset($_POST["submit"])){
			redirect('http://localhost:8012/bcvh/error');
		}else {
			$keyword = $_POST['keyword'];
			$dates = $_POST['datefilter'];
			$id_software = $_POST['software'];
			if (!isset($_POST["datefilter"])){
				$arrayDate = explode(" - ",$dates);
				$startDate = $arrayDate[0];
				$endDate = $arrayDate[1];
				$time_start = date("Y-m-d", strtotime($startDate));
				$time_end = date("Y-m-d", strtotime($endDate));
			} else {
				$time_start ='';
				$time_end ='';
			}

//			var_dump($array);
//			die();
//			echo $startDate;
//			echo $endDate;
//			die();

			//Check role hien thi event theo user role 3
			if ($_SESSION['user']['role'] == 3) {
				$idUser = $_SESSION['user']['id_user'];//Lay id theo Session user
				$dataProblem = $this->Mbcvh->getDataSeachProblemByIdUser($idUser,$keyword,$time_start,$time_end,$id_software);
				$dataSoftware = $this->Mbcvh->getSoftwareByIdUser($idUser);
				$this->load->view('search_result_view', ['dataProblem' => $dataProblem,'dataSoftware' => $dataSoftware]);
			} else {
				$dataProblem = $this->Mbcvh->getDataSeachProblem($keyword,$time_start,$time_end,$id_software);
				$dataSoftware = $this->Mbcvh->getAllSoftware();
				$this->load->view('search_result_view', ['dataProblem' => $dataProblem,'dataSoftware' => $dataSoftware]);
			}
		}
	}

	public function addProblem()
	{
		//Check role hien thi event theo user role 3 và role 2
		if ($_SESSION['user']['role'] == 3){
			$idUser = $_SESSION['user']['id_user'];//Lay id theo Session user
			$softwareByIdUser = $this->Mbcvh->getSoftwareByIdUser($idUser);
			$this->load->view('addProblem_view',['software' => $softwareByIdUser]);
		} elseif ($_SESSION['user']['role'] == 2) {
			redirect('http://localhost:8012/bcvh/error');
		} else {
			$software = $this->Mbcvh->getAllSoftware();
			$this->load->view('addProblem_view',['software' => $software]);
		}
	}

	public function insertProblem()
	{
		if (!isset($_POST["submit"])){
			redirect('http://localhost:8012/bcvh/error');
		}else{
			//Lay id theo Session user
			$idUser = $_SESSION['user']['id_user'];
			$idSoftware = $_POST['software'];
			$problemDetail = $_POST['problemDetail'];
			$solution = $_POST['solution'];
			$dateStart = $_POST['dateStart'];
			$dateEnd = $_POST['dateEnd'];

			// File upload path
			$targetDir = "uploads/";
			$fileName = basename($_FILES["file"]["name"]);
			$targetFilePath = $targetDir . $fileName;
			$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

			if(!empty($_FILES["file"]["name"])){
				// Allow certain file formats
				$allowTypes = array('jpg','png','jpeg');
				if(in_array($fileType, $allowTypes)){
					// Check if file already exists
					if (file_exists($targetFilePath)) {
						echo "Sorry, file already exists.";
					}else{
						// Upload file to server
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
							// Insert image file name into database
							$insert = $this->Mbcvh->insertProblem($idSoftware,$idUser,$problemDetail,$solution,$fileName,$dateStart,$dateEnd);
							if($insert){
//								$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
								redirect('http://localhost:8012/bcvh/problem');
							}else{
								$statusMsg = "File upload failed, please try again.";
							}
						}else{
							$statusMsg = "Sorry, there was an error uploading your file.";
						}
					}
				}else{
					$statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
				}
			}else{
				$statusMsg = 'Please select a file to upload.';
			}

			// Display status message
			echo $statusMsg;
		}
	}

	public function editProlem($id_problem)

	{
		$problem = $this->Mbcvh->getDataProblemByIdProblem($id_problem);
		//Lay du lieu cac phan mem theo role
		if ($_SESSION['user']['role'] == 3){
			$software = $this->Mbcvh->getSoftwareByIdUser($problem[0]['id_user']);
		} elseif ($_SESSION['user']['role'] == 1) {
			$software = $this->Mbcvh->getAllSoftware();
		} else {
			redirect('http://localhost:8012/bcvh/error');
		}
		$this->load->view('editProlem_view',['problem' => $problem,'software' => $software]);
	}

	public function updateProblem($id_problem)
	{
		if (!isset($_POST["submit"])){
			redirect('http://localhost:8012/bcvh/error');
		}else{
			//Lay id theo Session user
			$idUser = $_SESSION['user']['id_user'];
			$idSoftware = $_POST['software'];
			$problemDetail = $_POST['problemDetail'];
			$solution = $_POST['solution'];
			$dateStart = $_POST['dateStart'];
			$dateEnd = $_POST['dateEnd'];

			// File upload path
			$targetDir = "uploads/";
			$fileName = basename($_FILES["file"]["name"]);
			$targetFilePath = $targetDir . $fileName;
			$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

			if(!empty($_FILES["file"]["name"])){
				// Allow certain file formats
				$allowTypes = array('jpg','png','jpeg');
				if(in_array($fileType, $allowTypes)){
					// Check if file already exists
					if (file_exists($targetFilePath)) {
						echo "Sorry, file already exists.";
					}else{
						// Upload file to server
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
							// Update image file name into database
							$update = $this->Mbcvh->updateProblem($id_problem,$idSoftware,$idUser,$problemDetail,$solution,$fileName,$dateStart,$dateEnd);
							if($update){
								redirect('http://localhost:8012/bcvh/problem');
							}else{
								echo "File upload failed, please try again.";
							}
						}else{
							echo "Sorry, there was an error uploading your file.";
						}
					}
				}else{
					echo 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
				}
			}else{
				$update = $this->Mbcvh->updateProblemNonImage($id_problem,$idSoftware,$idUser,$problemDetail,$solution,$dateStart,$dateEnd);
				if($update){
					redirect('http://localhost:8012/bcvh/problem');
				}else{
					echo "Update failed";
				}
			}
		}
	}

	public function deleteProblem()
	{
		if ($this->input->post('idProblem')) {
			$idProblem = $this->input->post('idProblem');
			$delete = $this->Mbcvh->updateStatusProblemByIdProblem($idProblem);
			echo 1;
		} else {
			redirect('http://localhost:8012/bcvh/error');
		}
	}

	public function report()
	{
		$report = $this->Mbcvh->getDataReport();
		$this->load->view('report_view',['report' => $report]);
	}

	public function uploadReport()
	{
		if (!isset($_POST["submit"])){
			redirect('http://localhost:8012/bcvh/error');
		}else{
			//Lay ngay de insert...
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$date = date("Y-m-d");

			// File upload path
			$targetDir = "reports/";
			$fileName = basename($_FILES["file"]["name"]);
			$targetFilePath = $targetDir . $fileName;
			$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

			if(!empty($_FILES["file"]["name"])){
				// Allow certain file formats
				$allowTypes = array('pdf');
				if(in_array($fileType, $allowTypes)){
					// Check if file already exists
					if (file_exists($targetFilePath)) {
						echo "Sorry, file already exists.";
					}else{
						// Upload file to server
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
							// Insert pdf file name into database
							$insert = $this->Mbcvh->insertReport($fileName,$date);
							if($insert){
								redirect('http://localhost:8012/bcvh/report');
							}else{
								$statusMsg = "File upload failed, please try again.";
							}
						}else{
							$statusMsg = "Sorry, there was an error uploading your file.";
						}
					}
				}else{
					$statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
				}
			}else{
				$statusMsg = 'Please select a file to upload.';
			}

			// Display status message
			echo $statusMsg;
		}
	}

	public function uploadBGTReport()
	{
		if (!isset($_POST["submit"])){
			redirect('http://localhost:8012/bcvh/error');
		}else{
			//Lay ngay de insert...
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$date = date("Y-m-d");

			// File upload path
			$targetDir = "bgt_reports/";
			$fileName = basename($_FILES["file"]["name"]);
			$targetFilePath = $targetDir . $fileName;
			$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

			if(!empty($_FILES["file"]["name"])){
				// Allow certain file formats
				$allowTypes = array('pdf');
				if(in_array($fileType, $allowTypes)){
					// Check if file already exists
					if (file_exists($targetFilePath)) {
						echo "Sorry, file already exists.";
					}else{
						// Upload file to server
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
							// Insert pdf file name into database
							$insert = $this->Mbcvh->insertBGTReport($fileName,$date);
							if($insert){
								redirect('http://localhost:8012/bcvh/bgt_report');
							}else{
								$statusMsg = "File upload failed, please try again.";
							}
						}else{
							$statusMsg = "Sorry, there was an error uploading your file.";
						}
					}
				}else{
					$statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
				}
			}else{
				$statusMsg = 'Please select a file to upload.';
			}

			// Display status message
			echo $statusMsg;
		}
	}

	public function bgt_report()
	{
		$report = $this->Mbcvh->getDataBGTReport();
		$this->load->view('bgt_report_view',['report' => $report]);
	}



	public function user()
	{
		if ($_SESSION['user']['role'] == 1) {
			$this->load->view('user_view');
		} else {
			redirect('http://localhost:8012/bcvh/error');
		}
	}

	public function addUser()
	{
		//Lam sau
		$this->load->view('addUser_view');
	}

	public function error(){
		$this->load->view('404_view');
	}

	public function logout()
	{
		// Xóa session name
		unset($_SESSION['user']);
		redirect('http://localhost:8012/bcvh');
	}

//	Project cu===========================================



	public function register()
	{
		$dataCategory = $this->Mvhht->getDataCategory();
		$this->load->view('register_view',['category' => $dataCategory]);
	}

	public function check_public_name()
	{
		if ($this->input->post('publicname')){
			$publicname = $this->input->post('publicname');
			$res = $this->Mvhht->getDataByPublicName($publicname);
			if (!$res) {
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

	public function check_email()
	{
		if ($this->input->post('email')){
			$email = $this->input->post('email');
			$res = $this->Mvhht->getDataByEmail($email);
			if (!$res) {
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

	public function insert_seller()
	{
		if ($this->input->post('fullname')){
			$account_type = $this->input->post('account_type');
			$fullname = $this->input->post('fullname');
			$publicname = $this->input->post('publicname');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$add = $this->Mvhht->insertSeller($account_type,$fullname, $publicname, $email, $password);
			if ($add) {
				$status = 0;
				echo $status;
				$seller_info = array(
					//thieu id de co gi con doi mat khau duoc
					'publicname' => $publicname,
					'fullname' => $fullname,
					'email' => $email
				);
				$this->session->set_userdata('user', $seller_info);
			} else {
				$status = 1;
				echo $status;
			}
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function marketplace(){
		$dataCategory = $this->Mvhht->getDataCategory();
		$limit = 3;
		$dataCampaign = $this->Mvhht->getDataCampaign();
		$dataCampOffSet = $this->Mvhht->getDataCampByOffset(0,$limit);
		$countPage=ceil(count($dataCampaign)/$limit);

		$allData = array();
		for ($i = 0; $i < count($dataCampOffSet); $i++) {
			$dataPublicname = $this->Mvhht->getPublicnameByIdCamp($dataCampOffSet[$i]['id']);
			$firstImageLinkOfCampaign = $this->Mvhht->getFirstImageLinkByIdCampaign($dataCampOffSet[$i]['id']);
			$data = ['idCampaign' => $dataCampOffSet[$i]['id'], 'image_link' => $firstImageLinkOfCampaign, 'price' => $dataCampOffSet[$i]['price'], 'url' => $dataCampOffSet[$i]['url'], 'title' => $dataCampOffSet[$i]['title'], 'publicname' => $dataPublicname[0]['publicname']];
			array_push($allData, $data);
		}

		$this->load->view('marketplace_view', ['category' => $dataCategory, 'allData' => $allData, 'countPage'=>$countPage]);
	}

	public function pagination_marketplace()
	{
		if ($this->input->post('pageNumber')){
			$pageNumber = $this->input->post('pageNumber');
			$limit = 3;
			$offset=($pageNumber - 1) * $limit;
			$dataCampOffSet = $this->Mvhht->getDataCampByOffset($offset,$limit);

			$allData = array();
			for ($i = 0; $i < count($dataCampOffSet); $i++) {
				$dataPublicname = $this->Mvhht->getPublicnameByIdCamp($dataCampOffSet[$i]['id']);
				$firstImageLinkOfCampaign = $this->Mvhht->getFirstImageLinkByIdCampaign($dataCampOffSet[$i]['id']);
				$data = ['image_link' => $firstImageLinkOfCampaign, 'price' => $dataCampOffSet[$i]['price'], 'url' => $dataCampOffSet[$i]['url'], 'title' => $dataCampOffSet[$i]['title'], 'publicname' => $dataPublicname[0]['publicname']];
				array_push($allData, $data);
			}
			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function category($category)
	{
		$dataCategory = $this->Mvhht->getDataCategory();

		$flag = 0;
		if ($category == 'all') {
			$flag = 1;
		}
		for ($i = 0; $i < count($dataCategory); $i++) {
			if ($category == $dataCategory[$i]['category']) {
				$flag = 1;
			}
		}

		if ($flag == 0) {
			redirect('http://localhost:8012/teemarket/error');
		} else {
			if ($category == 'all') {
				$dataCampaign = $this->Mvhht->getDataCampaign();
				$limit = 3;
				$dataCampOffSet = $this->Mvhht->getDataCampByOffset(0,$limit);
				$countPage=ceil(count($dataCampaign)/$limit);

				$allData = array();
				if ($dataCampOffSet){
					for ($i = 0; $i < count($dataCampOffSet); $i++) {
						$dataPublicname = $this->Mvhht->getPublicnameByIdCamp($dataCampOffSet[$i]['id']);
						$firstImageLinkOfCampaign = $this->Mvhht->getFirstImageLinkByIdCampaign($dataCampOffSet[$i]['id']);
						$data = ['idCampaign' => $dataCampOffSet[$i]['id'], 'image_link' => $firstImageLinkOfCampaign, 'price' => $dataCampOffSet[$i]['price'], 'url' => $dataCampOffSet[$i]['url'], 'title' => $dataCampOffSet[$i]['title'], 'publicname' => $dataPublicname[0]['publicname'], 'category' => 'all'];
						array_push($allData, $data);
					}
				}
				$this->load->view('category_view', ['category' => $dataCategory, 'allData' => $allData, 'countPage'=>$countPage]);
			} else {
				$idCategory = $this->Mvhht->getIdCategoryByCategory($category);
				$campCategory = $this->Mvhht->getCampByIdCategory($idCategory[0]['id']);
				$limit = 3;
				$dataCampCateOffSet = $this->Mvhht->getDataCampCategoryByOffset(0,$limit,$idCategory[0]['id']);
				$countPage=ceil(count($campCategory)/$limit);

				$allData = array();
				if ($dataCampCateOffSet) {
					for ($i = 0; $i < count($dataCampCateOffSet); $i++) {
						$dataPublicname = $this->Mvhht->getPublicnameByIdCamp($dataCampCateOffSet[$i]['id']);
						$firstImageLinkOfCampaign = $this->Mvhht->getFirstImageLinkByIdCampaign($dataCampCateOffSet[$i]['id']);
						$data = ['idCampaign' => $dataCampCateOffSet[$i]['id'], 'image_link' => $firstImageLinkOfCampaign, 'price' => $dataCampCateOffSet[$i]['price'], 'url' => $dataCampCateOffSet[$i]['url'], 'title' => $dataCampCateOffSet[$i]['title'], 'publicname' => $dataPublicname[0]['publicname'], 'category' => $category];
						array_push($allData, $data);
					}
					$this->load->view('category_view', ['category' => $dataCategory, 'allData' => $allData, 'countPage'=>$countPage]);
				} else {
					$this->load->view('category_view', ['category' => $dataCategory,'name_category' => $category, 'countPage'=>$countPage]);
				}
			}
		}
	}

	public function pagination_category()
	{
		if ($this->input->post('pageNumber')){
			$category = $this->input->post('category');
			$pageNumber = $this->input->post('pageNumber');
			$idCategory = $this->Mvhht->getIdCategoryByCategory($category);

			$limit = 3;
			$offset=($pageNumber - 1) * $limit;
			if ($category != 'all') {
				$dataCampCateOffSet = $this->Mvhht->getDataCampCategoryByOffset($offset,$limit,$idCategory[0]['id']);
			} else {
				$dataCampCateOffSet = $this->Mvhht->getDataCampByOffset($offset,$limit);
			}

			$allData = array();
			for ($i = 0; $i < count($dataCampCateOffSet); $i++) {
				$dataPublicname = $this->Mvhht->getPublicnameByIdCamp($dataCampCateOffSet[$i]['id']);
				$firstImageLinkOfCampaign = $this->Mvhht->getFirstImageLinkByIdCampaign($dataCampCateOffSet[$i]['id']);
				$data = ['image_link' => $firstImageLinkOfCampaign, 'price' => $dataCampCateOffSet[$i]['price'], 'url' => $dataCampCateOffSet[$i]['url'], 'title' => $dataCampCateOffSet[$i]['title'], 'publicname' => $dataPublicname[0]['publicname']];
				array_push($allData, $data);
			}
			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/teemarket/error');
		}
	}

//	public function search($request){
//		$dataCategory = $this->Mvhht->getDataCategory();
//		$dataSearch = $this->Mvhht->search($request);
//
//		$limit = 3;
//		$dataSearchOffSet = $this->Mvhht->getDataSearchByOffset(0,$limit,$request);
//		$countPage=ceil(count($dataSearch)/$limit);
//
//		$allData = array();
//		if ($dataSearchOffSet) {
//			for ($i = 0; $i < count($dataSearchOffSet); $i++) {
//				$dataPublicname = $this->Mvhht->getPublicnameByIdCamp($dataSearchOffSet[$i]['id']);
//				$firstImageLinkOfCampaign = $this->Mvhht->getFirstImageLinkByIdCampaign($dataSearchOffSet[$i]['id']);
//				$data = ['idCampaign' => $dataSearchOffSet[$i]['id'], 'image_link' => $firstImageLinkOfCampaign, 'price' => $dataSearchOffSet[$i]['price'], 'url' => $dataSearchOffSet[$i]['url'], 'title' => $dataSearchOffSet[$i]['title'], 'publicname' => $dataPublicname[0]['publicname']];
//				array_push($allData, $data);
//			}
//			$this->load->view('search_view', ['category' => $dataCategory, 'allData' => $allData,'request'=>$request, 'countPage'=>$countPage]);
//		} else {
//			$this->load->view('search_view', ['category' => $dataCategory, 'request'=>$request]);
//		}
//
//	}

	public function pagination_search()
	{
		if ($this->input->post('pageNumber')){
			$request = $this->input->post('request');
			$pageNumber = $this->input->post('pageNumber');

			$limit = 3;
			$offset=($pageNumber - 1) * $limit;
			$dataSearchOffSet = $this->Mvhht->getDataSearchByOffset($offset,$limit,$request);

			$allData = array();
			for ($i = 0; $i < count($dataSearchOffSet); $i++) {
				$dataPublicname = $this->Mvhht->getPublicnameByIdCamp($dataSearchOffSet[$i]['id']);
				$firstImageLinkOfCampaign = $this->Mvhht->getFirstImageLinkByIdCampaign($dataSearchOffSet[$i]['id']);
				$data = ['image_link' => $firstImageLinkOfCampaign, 'price' => $dataSearchOffSet[$i]['price'], 'url' => $dataSearchOffSet[$i]['url'], 'title' => $dataSearchOffSet[$i]['title'], 'publicname' => $dataPublicname[0]['publicname']];
				array_push($allData, $data);
			}
			echo json_encode($allData);
		} else {
			redirect('http://localhost:8012/teemarket/error');
		}
	}


	public function view_product($publicname,$url)
	{
		if ($this->Mvhht->getDataByPublicnameAndUrl($publicname, $url)){
			$dataCategory = $this->Mvhht->getDataCategory();
			$dataProduct = $this->Mvhht->getDataByPublicnameAndUrl($publicname, $url);
			$dataCampaignColor = $this->Mvhht->getDataColorsByIdCamp($dataProduct[0]['id']);

			$this->load->view('product_details_view', ['category' => $dataCategory,'campaign_color' => $dataCampaignColor, 'dataCamp'=> $dataProduct]);
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function cart()
	{
		$dataCategory = $this->Mvhht->getDataCategory();
		$this->load->view('cart_view',['category' => $dataCategory]);
	}

	public function add_to_cart(){
		if ($this->input->post('id')){
			$id = $this->input->post('id');
			$image_link = $this->input->post('image_link');
			$color_code = $this->input->post('color_code');
			$size = $this->input->post('size');
			$quantity = $this->input->post('quantity');

			$dataProduct=$this->Mvhht->getDataProductById($id);
			$dataColor=$this->Mvhht->getDataColorByColorCode($color_code);
			$new_product = array(
				array(
					'id'			=> $id,
					'image_link'	=> $image_link,
					'id_color'		=> $dataColor[0]['id'],
					'color'			=> $dataColor[0]['color'],
					'title'			=> $dataProduct[0]['title'],
					'price'			=> $dataProduct[0]['price'],
					'size' 			=> $size,
					'quantity'		=> $quantity,
				)
			);
			if(isset($_SESSION['product'])){// Neu co Session product
				$found = false;
				foreach($_SESSION['product'] as $cart_item){
					if(($cart_item['id'] == $id) && ($cart_item['$color_code'] == $color_code) && ($cart_item['size'] == $size)){
						$product[] = array(
							'id'			=> $cart_item['id'],
							'image_link'	=> $cart_item['image_link'],
							'id_color'		=> $cart_item['id_color'],
							'color'			=> $cart_item['color'],
							'color_code'	=> $cart_item['color_code'],
							'title'			=> $cart_item['title'],
							'price'			=> $cart_item['price'],
							'size'			=> $cart_item['size'],
							'quantity'		=> ($quantity + $cart_item['quantity'])
						);
						$found = true;
					} else {
						$product[] = array(
							'id'			=> $cart_item['id'],
							'image_link'	=> $cart_item['image_link'],
							'id_color'		=> $cart_item['id_color'],
							'color'			=> $cart_item['color'],
							'color_code'	=> $cart_item['color_code'],
							'title'			=> $cart_item['title'],
							'price'			=> $cart_item['price'],
							'size'			=> $cart_item['size'],
							'quantity'		=> $cart_item['quantity']
						);
					}
				}
				if($found == true){ //Neu 2 san pham giong nhau
					$_SESSION['product'] = $product;
					unset($_SESSION['success']);
					$_SESSION['success']='thanh cong';

				}else{ //Neu 2 san pham khac nhau
					$_SESSION['product'] = array_merge($product,$new_product);
					unset($_SESSION['success']);
					$_SESSION['success']='thanh cong';
				}
			} else {// Neu khong co Session product
				$_SESSION['product'] = $new_product;
				unset($_SESSION['success']);
				$_SESSION['success']='thanh cong';
			}
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function update_cart(){
		if ($this->input->post('quantityString')){
			$quantityString =  $this->input->post('quantityString');
			$quantityArray = explode("-",$quantityString);

			foreach ($_SESSION['product'] as $keyUpdate => $value) {
				$_SESSION['product'][$keyUpdate]['quantity'] = $quantityArray[$keyUpdate];
			}
			$result = [
				'status' => true,
				'kq'     => $_SESSION['product']
			];
			echo json_encode($result);
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function remove_product($id,$id_color,$size){
		$found = false;
		if (isset($_SESSION['product'])){
			foreach ($_SESSION['product'] as $key => $value) {
				if(($value['id'] == $id) && ($value['id_color'] == $id_color) && ($value['size'] == $size)){
					$found = true;
					\array_splice($_SESSION['product'],$key,1);
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
			if($_SESSION['product'] == array()){
				unset($_SESSION['product']);
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		if ($found == false){
			redirect('http://localhost:8012/teemarket/error');
		}
	}

	public function checkout(){
		if (empty($_SESSION['product'])){
			redirect('http://localhost:8012/teemarket/cart');
		} else{
			$dataCategory = $this->Mvhht->getDataCategory();
			$this->load->view('checkout_view',['category' => $dataCategory]);
		}
	}

	public function insert_order(){
		if ($this->input->post('idString')){
			$email = $this->input->post('email');
			$fullname = $this->input->post('fullname');
			$address = $this->input->post('address');
			$countries = $this->input->post('countries');
			$states = $this->input->post('states');
			$cities = $this->input->post('cities');
			$zip = $this->input->post('zip');
			$idString = $this->input->post('idString');
			$sizeString = $this->input->post('sizeString');
			$idColorString = $this->input->post('idColorString');
			$quantityString = $this->input->post('quantityString');

			$idArray = explode("-",$idString);
			$sizeArray = explode("-",$sizeString);
			$idColorArray = explode("-",$idColorString);
			$quantityArray = explode("-",$quantityString);

			$inserInfoCustomer = $this->Mvhht->insertInfoCustomer($email, $fullname, $address, $countries, $states, $cities, $zip);
			$id_customer = $inserInfoCustomer[0]['LAST_INSERT_ID()'];

			$order = array(
				array(
				)
			);
			for ($i = 0; $i < count($idArray); $i++){
				$order[$i] = array(
					'id_customer' 	=> $id_customer,
					'id_campaign' 	=> $idArray[$i],
					'size' 			=> $sizeArray[$i],
					'id_color' 		=> $idColorArray[$i],
					'quantity' 		=> $quantityArray[$i]
				);
			}
			foreach ($order as $key => $value) {
				$this->Mvhht->insertOrder($value['id_customer'],$value['id_campaign'],$value['size'],$value['id_color'],$value['quantity']);
			}
			unset($_SESSION['product']);
		} else{
			redirect('http://localhost:8012/teemarket/error');
		}
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
