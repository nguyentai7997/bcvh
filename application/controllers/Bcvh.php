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
		redirect('http://10.96.3.52:8012/bcvh/dashboard');
	}

	public function dashboard()
	{
		if (empty($_SESSION['user'])) {
			redirect('http://10.96.3.52:8012/bcvh/login');
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
			redirect('http://10.96.3.52:8012/bcvh/error');
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
			redirect('http://10.96.3.52:8012/bcvh/error');
		}
	}

	public function viewEvent()
	{
		if ($this->input->post('idEvent')) {
			$idEvent = $this->input->post('idEvent');
			$events = $this->Mbcvh->getDataProblemByIdProblem($idEvent);
			echo json_encode($events);
		} else {
			redirect('http://10.96.3.52:8012/bcvh/error');
		}
	}

	public function problem()
	{
		$limit = 5;//so luong ban ghi
		$offset = 0;//vi tr bat dau lay du lieu
		//Check role hien thi event theo user role 3
		if ($_SESSION['user']['role'] == 3){
			$idUser = $_SESSION['user']['id_user'];//Lay id theo Session user
			$dataProblem = $this->Mbcvh->getDataProblemByIdUser($idUser);//dung de tinh so Page can co
			$dataProblemOffset = $this->Mbcvh->getDataProblemByOffsetAndIdUser($offset,$limit,$idUser);
			$dataSoftware = $this->Mbcvh->getSoftwareByIdUser($idUser);
			$countPage=ceil(count($dataProblem)/$limit);
			$this->load->view('problem_view',['dataProblem' => $dataProblemOffset,'dataSoftware' => $dataSoftware,'countPage'=>$countPage]);
		} else {
			$dataProblem = $this->Mbcvh->getAllDataProblem();//dung de tinh so Page can co
			$dataProblemOffset = $this->Mbcvh->getDataProblemByOffset($offset,$limit);
			$dataSoftware = $this->Mbcvh->getAllSoftware();
			$countPage=ceil(count($dataProblem)/$limit);
			$this->load->view('problem_view',['dataProblem' => $dataProblemOffset,'dataSoftware' => $dataSoftware,'countPage'=>$countPage]);
		}
	}

	public function pagination_problem()
	{
		if ($this->input->post('pageNumber')) {
			if ($_SESSION['user']['role'] == 3) {//Nguoi quan ly phan mem
				$idUser = $_SESSION['user']['id_user'];
				$pageNumber = $this->input->post('pageNumber');
				$limit = 5;//số lượng bản ghi
				$offset = ($pageNumber - 1) * $limit; //vị trí bắt đầu lấy dữ liệu
				$dataProblemOffSet = $this->Mbcvh->getDataProblemByOffsetAndIdUser($offset,$limit,$idUser);
				$role[0] = $_SESSION['user']['role'];
				$result = array_merge($role, $dataProblemOffSet);
				echo json_encode($result);
			} else {//Admin and viewer
				$pageNumber = $this->input->post('pageNumber');
				$limit = 5;//số lượng bản ghi
				$offset = ($pageNumber - 1) * $limit; //vị trí bắt đầu lấy dữ liệu
				$dataProblemOffSet = $this->Mbcvh->getDataProblemByOffset($offset,$limit);
				$role[0] = $_SESSION['user']['role'];
				$result = array_merge($role, $dataProblemOffSet);
				echo json_encode($result);
			}
		} else {
			redirect('http://10.96.3.52:8012/bcvh/error');
		}
	}

	public function search_result()
	{
		if (!isset($_POST["submit"])){
			redirect('http://10.96.3.52:8012/bcvh/problem');
		} else {
			$limit = 5;//so luong ban ghi
			$offset = 0;//vi tr bat dau lay du lieu
			if ($_POST['keyword'] == '' && $_POST['datefilter'] == null && $_POST['software'] == ''){
				$keyword = $_POST['keyword'];
				$id_software = $_POST['software'];
				$startDate = '';
				$endDate = '';

				//Check role hien thi event theo user role 3
				if ($_SESSION['user']['role'] == 3){
					$idUser = $_SESSION['user']['id_user'];//Lay id theo Session user
					$dataProblem = $this->Mbcvh->getDataProblemByIdUser($idUser);//dung de tinh so Page can co
					$dataProblemOffset = $this->Mbcvh->getDataProblemByOffsetAndIdUser($offset,$limit,$idUser);
					$dataSoftware = $this->Mbcvh->getSoftwareByIdUser($idUser);
					$countPage=ceil(count($dataProblem)/$limit);
					$this->load->view('search_result_view',['dataProblem' => $dataProblemOffset,'dataSoftware' => $dataSoftware,'countPage'=>$countPage,'keyword'=>$keyword,'startDate'=>$startDate,'endDate'=>$endDate,'id_software'=>$id_software]);
				} else {
					$dataProblem = $this->Mbcvh->getAllDataProblem();//dung de tinh so Page can co
					$dataProblemOffset = $this->Mbcvh->getDataProblemByOffset($offset,$limit);
					$dataSoftware = $this->Mbcvh->getAllSoftware();
					$countPage=ceil(count($dataProblem)/$limit);
					$this->load->view('search_result_view',['dataProblem' => $dataProblemOffset,'dataSoftware' => $dataSoftware,'countPage'=>$countPage,'keyword'=>$keyword,'startDate'=>$startDate,'endDate'=>$endDate,'id_software'=>$id_software]);
				}
			} else {//1 trong 3 trường có dữ liệu
				$keyword = $_POST['keyword'];
				$id_software = $_POST['software'];
				$dates = $_POST['datefilter'];
				$startDate = '';
				$endDate = '';
				$time_start = '';
				$time_end = '';
				if ($dates != null) {
					$arrayDate = explode(" - ",$dates);
					$startDate = $arrayDate[0];
					$endDate = $arrayDate[1];
					$time_start = date("Y-m-d", strtotime($startDate));
					$time_end = date("Y-m-d", strtotime($endDate));
				}

				//Check role hien thi event theo user role 3
				if ($_SESSION['user']['role'] == 3) {
					$idUser = $_SESSION['user']['id_user'];//Lay id theo Session user
					$dataProblem = $this->Mbcvh->getDataSeachProblemByIdUser($idUser,$keyword,$time_start,$time_end,$id_software);//dung de tinh so Page can co
					$dataProblemOffSet = $this->Mbcvh->getDataSearchProblemByOffsetAndIdUser($offset,$limit,$idUser,$keyword,$time_start,$time_end,$id_software);
					$dataSoftware = $this->Mbcvh->getSoftwareByIdUser($idUser);
					$countPage=ceil(count($dataProblem)/$limit);
					$this->load->view('search_result_view', ['dataProblem' => $dataProblemOffSet,'dataSoftware' => $dataSoftware,'countPage'=>$countPage,'keyword'=>$keyword,'startDate'=>$startDate,'endDate'=>$endDate,'id_software'=>$id_software]);
				} else {
					$dataProblem = $this->Mbcvh->getDataSeachProblem($keyword,$time_start,$time_end,$id_software);//dung de tinh so Page can co
					$dataProblemOffSet = $this->Mbcvh->getDataSearchProblemByOffset($offset,$limit,$keyword,$time_start,$time_end,$id_software);
					$dataSoftware = $this->Mbcvh->getAllSoftware();
					$countPage=ceil(count($dataProblem)/$limit);
					$this->load->view('search_result_view', ['dataProblem' => $dataProblemOffSet,'dataSoftware' => $dataSoftware,'countPage'=>$countPage,'keyword'=>$keyword,'startDate'=>$startDate,'endDate'=>$endDate,'id_software'=>$id_software]);
				}
			}
		}
	}

	public function pagination_search_problem()
	{
		if ($this->input->post('pageNumber')) {
			$keyword =  $this->input->post('keyword');
			$startDate = $this->input->post('startDate');
			$endDate = $this->input->post('endDate');
			$id_software = $this->input->post('id_software');
			$time_start = date("Y-m-d", strtotime($startDate));
			$time_end = date("Y-m-d", strtotime($endDate));

			if ($_SESSION['user']['role'] == 3) {//Nguoi quan ly phan mem
				$idUser = $_SESSION['user']['id_user'];
				$pageNumber = $this->input->post('pageNumber');
				$limit = 5;//số lượng bản ghi
				$offset = ($pageNumber - 1) * $limit; //vị trí bắt đầu lấy dữ liệu
				$dataProblemOffSet = $this->Mbcvh->getDataSeachProblemByIdUser($idUser,$keyword,$time_start,$time_end,$id_software);
				$role[0] = $_SESSION['user']['role'];
				$result = array_merge($role, $dataProblemOffSet);
				echo json_encode($result);
			} else {//Admin and viewer
				$pageNumber = $this->input->post('pageNumber');
				$limit = 5;//số lượng bản ghi
				$offset = ($pageNumber - 1) * $limit; //vị trí bắt đầu lấy dữ liệu
				$dataProblemOffSet = $this->Mbcvh->getDataSearchProblemByOffset($offset,$limit,$keyword,$time_start,$time_end,$id_software);
				$role[0] = $_SESSION['user']['role'];
				$result = array_merge($role, $dataProblemOffSet);
				echo json_encode($result);
			}
		} else {
			redirect('http://10.96.3.52:8012/bcvh/error');
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
			redirect('http://10.96.3.52:8012/bcvh/error');
		} else {
			$software = $this->Mbcvh->getAllSoftware();
			$this->load->view('addProblem_view',['software' => $software]);
		}
	}

	public function insertProblem()
	{
		if (!isset($_POST["submit"])){
			redirect('http://10.96.3.52:8012/bcvh/error');
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
			$file = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . basename($_FILES["file"]["name"]);
			$fileName = strtolower($file);
			$targetFilePath = $targetDir . $fileName;
			$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

			if(!empty($_FILES["file"]["name"])){//Nếu có ảnh
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
								//$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
								redirect('http://10.96.3.52:8012/bcvh/problem');
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
			redirect('http://10.96.3.52:8012/bcvh/error');
		}
		$this->load->view('editProlem_view',['problem' => $problem,'software' => $software]);
	}

	public function updateProblem($id_problem)
	{
		if (!isset($_POST["submit"])){
			redirect('http://10.96.3.52:8012/bcvh/error');
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
			$file = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . basename($_FILES["file"]["name"]);
			$fileName = strtolower($file);
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
								redirect('http://10.96.3.52:8012/bcvh/problem');
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
					redirect('http://10.96.3.52:8012/bcvh/problem');
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
			redirect('http://10.96.3.52:8012/bcvh/error');
		}
	}

	public function report()
	{
		$report = $this->Mbcvh->getDataReport();
		$year = $this->Mbcvh->getDataYear();
		$this->load->view('report_view',['report' => $report,'year' => $year]);
	}

	public function uploadReport()
	{
		if (!isset($_POST["submit"])){
			redirect('http://10.96.3.52:8012/bcvh/error');
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
								redirect('http://10.96.3.52:8012/bcvh/report');
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
		$year = $this->Mbcvh->getDataYear();
		$this->load->view('bgt_report_view',['report' => $report,'year' => $year]);
	}

	public function uploadBGTReport()
	{
		if (!isset($_POST["submit"])){
			redirect('http://10.96.3.52:8012/bcvh/error');
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
								redirect('http://10.96.3.52:8012/bcvh/bgt_report');
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

	public function user()
	{
		if ($_SESSION['user']['role'] == 1) {
			$this->load->view('user_view');
		} else {
			redirect('http://10.96.3.52:8012/bcvh/error');
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
		redirect('http://10.96.3.52:8012/bcvh');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
