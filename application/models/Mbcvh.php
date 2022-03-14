<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mbcvh extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}

	function getDataSignIn($usernameSignIn, $password)
	{
		$query = $this->db->query("SELECT * FROM user WHERE username = '$usernameSignIn' and password = '$password'")->result_array();
		return $query;
	}

	function getDataProblemByIdUser($idUser)
	{
		$query = $this->db->query("SELECT id_problem, software, problem_detail, time_start FROM problem, software WHERE problem.id_software = software.id_software AND problem.id_user = '$idUser' ORDER BY problem.time_start DESC ")->result_array();
		return $query;
	}

	function getAllDataProblem()
	{
		$query = $this->db->query("SELECT id_problem, software, problem_detail, time_start FROM problem, software WHERE problem.id_software = software.id_software ORDER BY problem.time_start DESC ")->result_array();
		return $query;
	}

	function getSoftwareByIdUser($idUser)
	{
		$query = $this->db->query("SELECT * FROM software WHERE id_user = '$idUser' ")->result_array();
		return $query;
	}

	function getAllSoftware()
	{
		$query = $this->db->query("SELECT * FROM software")->result_array();
		return $query;
	}

	function getDataSeachProblemByIdUser($idUser,$keyword,$time_start,$time_end,$id_software)
	{
		$strSelect = "SELECT id_problem, software, problem_detail, time_start FROM problem, software 
									WHERE problem.id_software = software.id_software 
									AND problem.id_user = '$idUser'";
		if ($keyword != "") {
			$strSelect = $strSelect." AND (problem.problem_detail LIKE '%$keyword%')";
		}
		if ($id_software != "") {
			$strSelect = $strSelect." AND (problem.id_software = '$id_software')";
		}
		if ($time_start != '') {
			$strSelect = $strSelect." AND DATE(problem.time_start) >= '$time_start' AND DATE(problem.time_end) <= '$time_end'";
		}
		$strSelect = $strSelect." ORDER BY problem.time_start DESC;";
		$query = $this->db->query($strSelect)->result_array();
		return $query;
	}

	function getDataSeachProblem($keyword,$time_start,$time_end,$id_software)
	{
		$strSelect = "SELECT id_problem, software, problem_detail, time_start FROM problem, software 
									WHERE problem.id_software = software.id_software";
		if ($keyword != "") {
			$strSelect = $strSelect." AND (problem.problem_detail LIKE '%$keyword%')";
		}
		if ($id_software != "") {
			$strSelect = $strSelect." AND (problem.id_software = '$id_software')";
		}
		if ($time_start != '') {
			$strSelect = $strSelect." AND DATE(problem.time_start) >= '$time_start' AND DATE(problem.time_end) <= '$time_end'";
		}
		$strSelect = $strSelect." ORDER BY problem.time_start DESC;";
		$query = $this->db->query($strSelect)->result_array();
		return $query;
	}

	function getIdUserByIdSoftware($idSoftware)
	{
		$query = $this->db->query("SELECT * FROM software WHERE id_software = '$idSoftware' ")->result_array();
		return $query;
	}

	public function insertProblem($idSoftware,$idUser,$problemDetail,$solution,$filename,$dateStart,$dateEnd)
	{
		$query = $this->db->query("INSERT INTO problem (id_software,id_user,problem_detail,solution,image,time_start,time_end) VALUES ('$idSoftware','$idUser','$problemDetail','$solution','$filename','$dateStart','$dateEnd')");
		return $query;
	}

	public function updateProblem($id_problem,$idSoftware,$idUser,$problemDetail,$solution,$fileName,$dateStart,$dateEnd)
	{
		$query = $this->db->query("UPDATE problem SET id_software='$idSoftware',id_user='$idUser',problem_detail='$problemDetail',solution='$solution',image='$fileName',time_start='$dateStart',time_end='$dateEnd' WHERE id_problem = '$id_problem'");
		return $query;
	}

	public function updateProblemNonImage($id_problem,$idSoftware,$idUser,$problemDetail,$solution,$dateStart,$dateEnd)
	{
		$query = $this->db->query("UPDATE problem SET id_software='$idSoftware',id_user='$idUser',problem_detail='$problemDetail',solution='$solution',time_start='$dateStart',time_end='$dateEnd' WHERE id_problem = '$id_problem'");
		return $query;
	}

	function getDataProblemByIdProblem($id_problem)
	{
		$query = $this->db->query("SELECT problem.id_problem, software.id_software, software.software, problem.id_user, problem.problem_detail, problem.solution, problem.image, problem.time_start, problem.time_end FROM problem, software WHERE problem.id_software = software.id_software AND problem.id_problem = '$id_problem'")->result_array();
		return $query;
	}

	function updateStatusProblemByIdProblem($idProblem)
	{
		$query = $this->db->query("UPDATE problem SET status = '0' WHERE id_problem = '$idProblem'");
		return $query;
	}

	public function getDataProblemByOffset($offset,$limit)
	{
		$query=$this->db->query("SELECT campaign.id,campaign.title,campaign.price,campaign.url,account.publicname FROM campaign,account WHERE campaign.id_seller = account.id AND status = 'active' LIMIT $offset, $limit")->result_array();
		return $query;
	}

	function getDataReport()
	{
		$query = $this->db->query("SELECT * FROM report")->result_array();
		return $query;
	}

	public function insertReport($fileName,$date)
	{
		$query = $this->db->query("INSERT INTO report (filename,time) VALUES ('$fileName','$date')");
		return $query;
	}

	function getDataBGTReport()
	{
		$query = $this->db->query("SELECT * FROM bgt_report")->result_array();
		return $query;
	}

	public function insertBGTReport($fileName,$date)
	{
		$query = $this->db->query("INSERT INTO bgt_report (filename,time) VALUES ('$fileName','$date')");
		return $query;
	}

//	Project cu==========================================================================================================
	function getDataByPublicName($publicname)
	{
		$query = $this->db->query("SELECT * FROM account WHERE publicname = '$publicname' ")->result_array();
		return $query;
	}

	function getDataByEmail($email)
	{
		$query = $this->db->query("SELECT * FROM account WHERE email = '$email' ")->result_array();
		return $query;
	}

	public function insertSeller($account_type,$fullname,$publicname,$email,$password)
	{
		$query = $this->db->query("INSERT INTO account (account_type,fullname,publicname,email,password) VALUES ('$account_type','$fullname','$publicname','$email','$password')");
		return $query;
	}

	function search($request)
	{
		$query = $this->db->query("SELECT * FROM campaign WHERE status = 'active' AND title LIKE '%$request%'")->result_array();
		return $query;
	}

	function getPassByIdAccount($id)
	{
		$query = $this->db->query("SELECT password FROM account WHERE id = '$id'")->result_array();
		return $query;
	}

	function updatePassword($id, $new_pass)
	{
		$query = $this->db->query("UPDATE account SET password = '$new_pass' WHERE id = '$id'");
		return $query;
	}

	function getDataColor()
	{
		$query = $this->db->query("SELECT * FROM color")->result_array();
		return $query;
	}

	function getRgbByColorName($myColor)
	{
		$query = $this->db->query("SELECT color_code FROM color WHERE color = '$myColor'")->result_array();
		return $query;
	}

	function getDataCategory()
	{
		$query = $this->db->query("SELECT * FROM category")->result_array();
		return $query;
	}

	function getIdCategoryByCategory($category)
	{
		$query = $this->db->query("SELECT id FROM category WHERE category = '$category'")->result_array();
		return $query;
	}

	function getCampByIdCategory($id)
	{
		$query = $this->db->query("SELECT campaign.id,campaign.price,campaign.url,campaign.title FROM campaign,category WHERE campaign.id_category = category.id AND category.id = '$id' AND campaign.status = 'active'")->result_array();
		return $query;
	}

	function insertCampaign($id,$src_image,$price,$title,$description,$url,$category)
	{
		$query = $this->db->query("INSERT INTO campaign (id_seller,design,price,title,description,url,id_category,status,time) VALUES ('$id','$src_image','$price','$title','$description','$url','$category','active',CURRENT_TIMESTAMP)");
		return $query;
	}

	function getIdCampByIdSellerAndUrl($id,$url)
	{
		$query = $this->db->query("SELECT id FROM campaign WHERE id_seller = '$id' and url = '$url'")->result_array();
		return $query;
	}

	function getIdColorByColorCode($color_code)
	{
		$query = $this->db->query("SELECT id FROM color WHERE color_code = '$color_code'")->result_array();
		return $query;
	}

	function getMockupByColorCode($color_code)
	{
		$query = $this->db->query("SELECT mockup FROM color WHERE color_code = '$color_code'")->result_array();
		return $query;
	}

	function insertCampColors($id_campaign,$id_color,$image_link)
	{
		$query = $this->db->query("INSERT INTO campaign_colors (id_campaign,id_color,image_link) VALUES ('$id_campaign','$id_color','$image_link')");
		return $query;
	}

	function getDataCampaign()
	{
		$query = $this->db->query("SELECT * FROM campaign WHERE status = 'active'")->result_array();
		return $query;
	}

	public function getDataCampByOffset($offset,$limit)
	{
		$query=$this->db->query("SELECT campaign.id,campaign.title,campaign.price,campaign.url,account.publicname FROM campaign,account WHERE campaign.id_seller = account.id AND status = 'active' LIMIT $offset, $limit")->result_array();
		return $query;
	}

	public function getDataCampCategoryByOffset($offset,$limit,$idCategory)
	{
		$query=$this->db->query("SELECT campaign.id,campaign.title,campaign.price,campaign.url,account.publicname FROM campaign,account,category WHERE account.id = campaign.id_seller AND campaign.id_category = category.id AND status = 'active' AND campaign.id_category = '$idCategory' LIMIT $offset, $limit")->result_array();
		return $query;
	}

	public function getDataSearchByOffset($offset,$limit,$request)
	{
		$query=$this->db->query("SELECT campaign.id,campaign.title,campaign.price,campaign.url,account.publicname FROM campaign,account,category WHERE account.id = campaign.id_seller AND campaign.id_category = category.id AND status = 'active' AND campaign.title LIKE '%$request%' LIMIT $offset, $limit")->result_array();
		return $query;
	}

	function getDataCampaignById($id_campaign,$id_seller)
	{
		$query = $this->db->query("SELECT campaign.title,campaign.id,campaign.description,campaign.url,campaign.status,campaign.id_category,account.publicname FROM campaign,account WHERE campaign.id_seller = account.id AND campaign.id = '$id_campaign' AND account.id = '$id_seller'")->result_array();
		return $query;
	}

	function getFirstImageLinkByIdCampaign($idCampaign)
	{
		$allImageLink = $this->db->query("SELECT image_link FROM campaign_colors WHERE id_campaign = '$idCampaign'")->result_array();
		$firstImageLink = $allImageLink[0]["image_link"];
		return $firstImageLink;
	}

	function getDataColorsByIdCamp($idCampaign){
		$query = $this->db->query("SELECT campaign_colors.id_color,campaign_colors.image_link,color.color,color.color_code FROM campaign_colors,color  WHERE campaign_colors.id_color = color.id AND campaign_colors.id_campaign = '$idCampaign' ")->result_array();
		return $query;
	}

	function getPublicnameByIdCamp($idCampaign){
		$query = $this->db->query("SELECT publicname FROM campaign,account WHERE campaign.id_seller = account.id AND campaign.id = '$idCampaign'")->result_array();
		return $query;
	}

	function getDataByPublicnameAndUrl($publicname, $url)
	{
		$dataIdSeller = $this->db->query("SELECT id FROM account where publicname ='$publicname'")->result_array();
		$idSeller = $dataIdSeller[0]['id'];
		$data = $this->db->query("SELECT * FROM campaign where id_seller ='$idSeller' and url='$url'")->result_array();
		return $data;
	}

	function getDataProductById($id)
	{
		$query = $this->db->query("SELECT title,price FROM campaign where id ='$id'")->result_array();
		return $query;
	}

	function getDataColorByColorCode($color_code)
	{
		$query = $this->db->query("SELECT * FROM color where color_code ='$color_code'")->result_array();
		return $query;
	}

	function insertInfoCustomer($email,$fullname,$address,$country,$state,$city,$zip)
	{
		$insertInfoCustomer = $this->db->query("INSERT INTO info_customer ( `email`, `fullname`, `address`, `country`, `state`, `city`, `zip`, `time`) VALUES ('$email','$fullname','$address','$country','$state','$city','$zip',CURRENT_TIMESTAMP)");
		$idCustomer = $this->db->query("SELECT LAST_INSERT_ID()")->result_array();
		return $idCustomer;
	}

	function insertOrder($id_customer,$id_campaign,$size,$id_color,$quantity)
	{
		$query = $this->db->query("INSERT INTO orders ( `id_customer`, `id_campaign`, `size`, `id_color`, `quantity` , `status`) VALUES ('$id_customer','$id_campaign','$size','$id_color', '$quantity', 'pending')");
		return $query;
	}

	function getAllCampaignsOfSeller($id)
	{
		$query = $this->db->query("SELECT campaign.id,campaign.title,campaign.price,campaign.url,campaign.status,account.publicname FROM campaign,account WHERE campaign.id_seller = account.id AND campaign.id_seller ='$id'")->result_array();
		return $query;
	}

	function getAllOrdersOfCampaign($id)
	{
		$query = $this->db->query("SELECT COUNT(DISTINCT id_customer) FROM orders WHERE id_campaign = '$id'")->result_array();
		return $query;
	}

	function getAllUnitsOfCampaign($id)
	{
		$query = $this->db->query("SELECT quantity FROM orders WHERE id_campaign = '$id'")->result_array();
		return $query;
	}

	function getDataPaymentByIdSeller($id)
	{
		$query = $this->db->query("SELECT * FROM payment_method where id_seller ='$id'")->result_array();
		return $query;
	}

	function updatePayment($id,$paypal,$payoneer)
	{
		$query = $this->db->query("UPDATE payment_method SET paypal = '$paypal' , payoneer = '$payoneer'  WHERE id_seller = '$id'");
		return $query;
	}

	function insertPayment($id,$paypal,$payoneer)
	{
		$query = $this->db->query("INSERT INTO payment_method ( `id_seller`, `paypal`, `payoneer`) VALUES ('$id','$paypal','$payoneer')");
		return $query;
	}

	function updateCampaign($id,$title,$description,$category)
	{
		$query = $this->db->query("UPDATE campaign SET title = '$title' , description = '$description' , id_category = '$category' WHERE id = '$id'");
		return $query;
	}

	function endCampaign($id)
	{
		$query = $this->db->query("UPDATE campaign SET status = 'ended' WHERE id = '$id'");
		return $query;
	}

	function getInfoSeller($id)
	{
		$query = $this->db->query("SELECT * FROM account where id ='$id'")->result_array();
		return $query;
	}

	function updateInfo($id,$fullname,$publicname,$address,$countries,$states,$cities,$zip,$phone)
	{
		$query = $this->db->query("UPDATE account SET fullname = '$fullname' , publicname = '$publicname' , address = '$address' , country = '$countries' , state = '$states' , city = '$cities' , zip = '$zip' , phone = '$phone' WHERE id = '$id'");
		return $query;
	}

	function getOrdersByIdSeller($id)
	{
		$query = $this->db->query("SELECT info_customer.time,campaign.title,orders.id,info_customer.email,info_customer.country,orders.quantity,campaign.price,orders.status FROM info_customer,orders,campaign WHERE info_customer.id = orders.id_customer AND orders.id_campaign = campaign.id AND campaign.id_seller = '$id'")->result_array();
		return $query;
	}

	function getCampaignActive($id_seller)
	{
		$query = $this->db->query("SELECT campaign.id FROM campaign,account WHERE account.id = campaign.id_seller AND campaign.id_seller = '$id_seller' AND status = 'active'")->result_array();
		return $query;
	}

	function adminGetCampaignActive()
	{
		$query = $this->db->query("SELECT campaign.id FROM campaign,account WHERE account.id = campaign.id_seller AND status = 'active'")->result_array();
		return $query;
	}

	function getCampaignEnded($id_seller)
	{
		$query = $this->db->query("SELECT campaign.id FROM campaign,account WHERE account.id = campaign.id_seller AND campaign.id_seller = '$id_seller' AND status = 'ended'")->result_array();
		return $query;
	}

	function adminGetCampaignEnded()
	{
		$query = $this->db->query("SELECT campaign.id FROM campaign,account WHERE account.id = campaign.id_seller AND status = 'ended'")->result_array();
		return $query;
	}

	function getDataByTime($time,$id)
	{
		$query = $this->db->query("SELECT campaign.price,orders.quantity FROM info_customer,orders,campaign WHERE info_customer.id = orders.id_customer AND orders.id_campaign = campaign.id AND campaign.id_seller = '$id' AND info_customer.time LIKE '%$time%'")->result_array();
		return $query;
	}

	function adminGetDataByTime($time)
	{
		$query = $this->db->query("SELECT campaign.price,orders.quantity FROM info_customer,orders,campaign WHERE info_customer.id = orders.id_customer AND orders.id_campaign = campaign.id AND info_customer.time LIKE '%$time%'")->result_array();
		return $query;
	}

	function getOrdersByTime($time,$id)
	{
		$query = $this->db->query("SELECT COUNT(DISTINCT info_customer.id) FROM info_customer,orders,campaign WHERE info_customer.id = orders.id_customer AND orders.id_campaign = campaign.id AND campaign.id_seller = '$id' AND info_customer.time LIKE '%$time%'")->result_array();
		return $query;
	}

	function adminGetOrdersByTime($time)
	{
		$query = $this->db->query("SELECT COUNT(DISTINCT info_customer.id) FROM info_customer,orders,campaign WHERE info_customer.id = orders.id_customer AND orders.id_campaign = campaign.id AND info_customer.time LIKE '%$time%'")->result_array();
		return $query;
	}

	function getDataAllTime($id)
	{
		$query = $this->db->query("SELECT campaign.price,orders.quantity FROM info_customer,orders,campaign WHERE info_customer.id = orders.id_customer AND orders.id_campaign = campaign.id AND campaign.id_seller = '$id'")->result_array();
		return $query;
	}

	function getOrdersAllTime($id)
	{
		$query = $this->db->query("SELECT COUNT(DISTINCT info_customer.id) FROM info_customer,orders,campaign WHERE info_customer.id = orders.id_customer AND orders.id_campaign = campaign.id AND campaign.id_seller = '$id'")->result_array();
		return $query;
	}

	function getAllIdCustomer($id)
	{
		$query = $this->db->query("SELECT DISTINCT info_customer.id FROM info_customer,orders,campaign WHERE info_customer.id = orders.id_customer AND orders.id_campaign = campaign.id AND campaign.id_seller = '$id' ORDER BY info_customer.id ASC")->result_array();
		return $query;
	}

	function adminGetAllIdCustomer()
	{
		$query = $this->db->query("SELECT DISTINCT info_customer.id FROM info_customer,orders,campaign WHERE info_customer.id = orders.id_customer AND orders.id_campaign = campaign.id ORDER BY info_customer.id ASC")->result_array();
		return $query;
	}

	function getAllDay($id)
	{
		$query = $this->db->query("SELECT time FROM info_customer WHERE id = '$id'")->result_array();
		return $query;
	}

	function getPayoutsAvailableByIdSeller($id)
	{
		$query = $this->db->query("SELECT orders.id,orders.quantity,campaign.price FROM orders,campaign,account WHERE orders.id_campaign = campaign.id AND campaign.id_seller = account.id AND account.id = '$id' AND orders.status = 'pending'")->result_array();
		return $query;
	}

	function getPayoutsRequestedByIdSeller($id)
	{
		$query = $this->db->query("SELECT payout_requested FROM payout WHERE id_seller = '$id' AND payout.status = 'requested'")->result_array();
		return $query;
	}

	function getTotalPaidByIdSeller($id)
	{
		$query = $this->db->query("SELECT payout_requested FROM payout WHERE id_seller = '$id' AND payout.status = 'paid'")->result_array();
		return $query;
	}

	function getCampaignsPayoutsByIdSeller($id)
	{
		$query = $this->db->query("SELECT info_customer.time,campaign.title,orders.quantity,campaign.price FROM info_customer,orders,campaign WHERE info_customer.id = orders.id_customer AND orders.id_campaign = campaign.id AND campaign.id_seller = '$id' AND orders.status = 'pending' ORDER BY orders.id ASC")->result_array();
		return $query;
	}

	function getCampaignsPayoutsRequestedByIdSeller($id)
	{
		$query = $this->db->query("SELECT time,payout_requested,payment_mode,status FROM payout WHERE id_seller = '$id' ORDER BY time ASC")->result_array();
		return $query;
	}

	function getPaymentByIdSeller($id)
	{
		$query = $this->db->query("SELECT paypal,payoneer FROM payment_method WHERE id_seller = '$id'")->result_array();
		return $query;
	}

	function insertPayouts($id,$request,$payment_mode,$request_time)
	{
		$query = $this->db->query("INSERT INTO payout ( `id_seller`, `payout_requested`, `payment_mode`,  `status`,  `time`) VALUES ('$id','$request','$payment_mode','requested','$request_time')");
		return $query;
	}

	function updateStatusOrders($id_orders)
	{
		$query = $this->db->query("UPDATE orders SET status = 'requested' WHERE id = '$id_orders'");
		return $query;
	}

	function getDataSellerSignIn($email, $password)
	{
		$query = $this->db->query("SELECT * FROM account WHERE email = '$email' and password = '$password' and account_type = 'admin'")->result_array();
		return $query;
	}

	function getAllCampaigns()
	{
		$query = $this->db->query("SELECT campaign.id,campaign.title,campaign.price,campaign.url,campaign.status,account.publicname FROM campaign,account WHERE campaign.id_seller = account.id")->result_array();
		return $query;
	}

	function adminGetDataCampaignById($id_campaign)
	{
		$query = $this->db->query("SELECT campaign.design,campaign.title,campaign.price,campaign.id,campaign.description,campaign.url,campaign.status,campaign.id_category,account.publicname FROM campaign,account WHERE campaign.id_seller = account.id AND campaign.id = '$id_campaign'")->result_array();
		return $query;
	}

	function getOrders()
	{
		$query = $this->db->query("SELECT orders.id,info_customer.time,orders.id_campaign,info_customer.email,info_customer.country,orders.quantity,orders.status FROM info_customer,orders,campaign WHERE info_customer.id = orders.id_customer AND orders.id_campaign = campaign.id")->result_array();
		return $query;
	}

	function updateOrder($order_id,$status)
	{
		$query = $this->db->query("UPDATE orders SET status = '$status' WHERE id = '$order_id'");
		return $query;
	}

	function getMockups()
	{
		$query = $this->db->query("SELECT * FROM color")->result_array();
		return $query;
	}

	function insertMockup($color_name,$color_code_rgb,$mockup)
	{
		$query = $this->db->query("INSERT INTO color ( `color`, `color_code`, `mockup`) VALUES ('$color_name','$color_code_rgb','$mockup')");
		return $query;
	}

	function updateMockup($color_id,$color_name,$color_code)
	{
		$query = $this->db->query("UPDATE color SET color = '$color_name' , color_code = '$color_code' WHERE id = '$color_id'");
		return $query;
	}

	function checkOrdersByIdColor($id)
	{
		$query = $this->db->query("SELECT id_color FROM orders WHERE id_color = '$id'")->result_array();
		return $query;
	}

	function deleteCampaignColor($id)
	{
		$query = $this->db->query("DELETE FROM campaign_colors WHERE id_color = '$id'");
		return $query;
	}

	function deleteMockup($id)
	{
		$query = $this->db->query("DELETE FROM color WHERE id = '$id'");
		return $query;
	}

	function insertCategory($category_name)
	{
		$query = $this->db->query("INSERT INTO category ( `category`) VALUES ('$category_name')");
		return $query;
	}

	function updateCategory($category_id,$category_name)
	{
		$query = $this->db->query("UPDATE category SET category = '$category_name' WHERE id = '$category_id'");
		return $query;
	}

	function updateCampaignCategory($id)
	{
		$query = $this->db->query("UPDATE campaign SET id_category = '1' WHERE id_category = '$id'");
		return $query;
	}

	function deleteCategory($id)
	{
		$query = $this->db->query("DELETE FROM category WHERE id = '$id'");
		return $query;
	}

	function getUsers()
	{
		$query = $this->db->query("SELECT * FROM account WHERE account_type = 'seller'")->result_array();
		return $query;
	}

	function checkRequestOfUser($id_seller)
	{
		$query = $this->db->query("SELECT COUNT(DISTINCT id_seller) FROM payout WHERE id_seller = '$id_seller' AND status = 'requested'")->result_array();
		return $query;
	}

	function getDateRequestedOfUser($id_user)
	{
		$query = $this->db->query("SELECT * FROM payout WHERE id_seller = '$id_user'")->result_array();
		return $query;
	}

	function getPaymentMethodByIdPayout($id_user,$payment_mode)
	{
		$query = $this->db->query("SELECT $payment_mode FROM payment_method WHERE id_seller = '$id_user'")->result_array();
		return $query;
	}

	function updatePayout($id,$pay_time)
	{
		$query = $this->db->query("UPDATE payout SET status = 'paid',pay_time = '$pay_time' WHERE id = '$id'");
		return $query;
	}

}

/* End of file test.php */
/* Location: ./application/models/test.php */
