<?php
class Website{
	private $db;

	private $applicant_name;
	private $applicant_surname;
	private $applicant_email;
	private $applicant_cellphone;
	private $applicant_resume;
	private $current_date;
	private $application_status;
	//customer data
	private $logo;
	private $image_gallary;
	private $domain;
	private $favicon;
	private $namee;
	private $phone_number;
	private $customer_email;
	private	$notes;
	private $category;
	private $dates;
	private $company_profile;
	private $extra_disk;
	private $adv_seo;
	private $extra_pages;
	private $content;
	
	

function __construct(){
/* Database config */
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'ttch'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);

date_default_timezone_set('Africa/johannesburg');
	$this->db = $db;
	$this->current_date = date("Y-m-d");
}

	public function addApplication($a_name, $a_surname, $a_email, $a_cellphone, $a_resume,$jobId){
		$status = "Pending";

		$query = $this->db->prepare("INSERT INTO `application`(`a_name`, `a_surname`, `a_email`, `a_cellphone`, `a_resume`, `a_date`, `a_status`,`job_id`) VALUES (?,?,?,?,?,?,?)");
		$query->execute(array($a_name, $a_surname, $a_email, $a_cellphone, $a_resume, $this->current_date,$status,$jobId));
	}
	public function checkAppliExist($email,$jobTitle){
		$jobTitle = md5($jobTitle);
		$query = $this->db->prepare("SELECT * from application where a_email = ? and job_id = ?");
		$query->execute(array($email,$jobTitle));
		$result = $query->rowCount();

	return $result;
	}

	public function addCustomerInfo() {
		$logo = $image_gallary = $domain = $favicon = $namee  = $phone_number = $customer_email = $notes = $company_profile = $extra_disk = $extra_pages = $content = "";
	
		$logo = isset($_POST["logo"]) ? htmlspecialchars($_POST["logo"]) : 'off';
		$image_gallary = isset($_POST["image_gallary"]) ? htmlspecialchars($_POST["image_gallary"]) : 'off';
		$domain = isset($_POST["domain"]) ? htmlspecialchars($_POST["domain"]) : 'off';
		$favicon = isset($_POST["favicon"]) ? htmlspecialchars($_POST["favicon"]) : 'off';
		$namee = isset($_POST["namee"]) ? htmlspecialchars($_POST["namee"]) : '';
		$phone_number = isset($_POST["phone_number"]) ? htmlspecialchars($_POST["phone_number"]) : '';
		$customer_email = isset($_POST["customer_email"]) ? htmlspecialchars($_POST["customer_email"]) : '';
		$notes = isset($_POST["notes"]) ? htmlspecialchars($_POST["notes"]) : '';
		$category = isset($_POST["category"]) ? htmlspecialchars($_POST["category"]) : '';
		$company_profile = isset($_POST["company_profile"]) ? htmlspecialchars($_POST["company_profile"]) : 'off';
		$dates = isset($_POST["dates"]) ? htmlspecialchars($_POST["dates"]) : '';
		$extra_disk = isset($_POST["extra_disk"]) ? htmlspecialchars($_POST["extra_disk"]) : '';
		$adv_seo = isset($_POST["adv_seo"]) ? htmlspecialchars($_POST["adv_seo"]) : '';
		$extra_pages = isset($_POST["extra_pages"]) ? htmlspecialchars($_POST["extra_pages"]) : '';
		$content = isset($_POST["content"]) ? htmlspecialchars($_POST["content"]) : '';
	
	
		$sql_query = $this->db->prepare("INSERT INTO customer (logo, image_gallary, category, notes, customer_email, customer_name, domain, favicon, phone_number, company_profile, extra_disk, adv_seo, extra_pages, content) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?)");
	
		if ($sql_query->execute(array($logo, $image_gallary,$category, $notes, $customer_email, $namee, $domain, $favicon, $phone_number, $company_profile, $extra_disk, $adv_seo, $extra_pages, $content))) {
			//echo "Data successfully inserted.";
		} else {
			//echo "Error inserting data.";
		}
	}
	
	public function getAllCustomers() { 
		$sql_query = $this->db->prepare("SELECT customer_id FROM customer");
		$sql_query->execute();
		return $sql_query;
	}
	protected function setLogo($logo) {
		if ($logo =='off' || $logo == '') 
		{
		$this->logo= 'No logo';
		}
		else {
			$this->logo='Logo Available';
		}
	}
	protected function setContent($content) {
		if ($content =='off' || $content == '') 
		{
		$this->content= 'No content';
		}
		else {
			$this->content='Content Available';
		}
	}
	protected function setExtra_disk($extra_disk) {
		if ($extra_disk =='null' || $extra_disk == '') 
		{
		$this->extra_disk= 'No extra disk needed';
		}
		else {
			$this->extra_disk = $extra_disk;
		}
	}
	protected function setExtra_pages($extra_pages) {
		if ($extra_pages == 'null' || $extra_pages == '') {
			$this->extra_pages = 'No extra pages needed';
		} else {
			$this->extra_pages = $extra_pages;
		}
	}
	protected function setAdv_seo($adv_seo) {
		if ($adv_seo =='no') 
		{
		$this->adv_seo= 'No advanced SEO needed';
		}
		elseif ($adv_seo == 'yes')
		{
			$this->adv_seo= 'Advanced SEO needed';
			}
		
	}
	protected function setCategory($category) {
		if ($category =='basic') 
		{
		$this->category= 'Basic Website';
		}
		elseif ($category == 'e-commerce')
		{
			$this->category= 'E-Commerce Website';
		}
		elseif ($category == 'enterprise')
			{
			$this->category= 'Enterprise Website';
		} 
	}
	
	protected function setCompany_profile($company_profile) {
		if ($company_profile=='off' || $company_profile == '') 
		{
		$this->company_profile= 'No company profile';
		}
		else {
			$this->company_profile='Company Profile Available';
		}
	}
	protected function setImage_gallary($image_gallary) {
		if ($image_gallary =='off' || $image_gallary == '') 
		{
		$this->image_gallary= 'No Image Gallery';
		}
		else {
			$this->image_gallary='Image Gallery Available';
		}
	}
	protected function setDomain($domain) {
		if ($domain =='off' || $domain == '') 
		{
		$this->domain= 'No domain';
		}
		else {
			$this->domain='Domain Available';
		}
	}
	protected function setFavicon($favicon) {
		if ($favicon =='off' || $favicon == '') 
		{
		$this->favicon= 'No favicon';
		}
		else {
			$this->favicon='Favicon Available';
		}
	}
	
	
	
	
	public function getCustomerDataById($id) {
		$sql_query = $this->db->prepare("SELECT * FROM customer WHERE customer_id=?");
		$sql_query->execute(array ( $id ));
		while ($row = $sql_query->fetch()){
			$this->setLogo($row['logo']);
			 $this->setImage_gallary($row['image_gallary']);
			 $this->setdomain( $row["domain"] );
			 $this->setFavicon($row["favicon"]);
			 $this->namee = $row['customer_name'];
			 $this->phone_number = $row['phone_number'];
			 $this->customer_email = $row['customer_email'];
			 $this->notes = $row['notes'];
			 $this->setCategory($row['category']);
			 $this->setCompany_profile($row['company_profile']);
			 $this->dates = $row['dates'];
			 $this->setExtra_disk($row['extra_disk']);
			 $this->setAdv_seo($row['adv_seo']);
			 $this->setExtra_pages($row['extra_pages']);
			 $this->setContent($row['content']);
 
		}

	}
	//public function getCustomerDataById($id) {}
	public function getCustomerLogo() {
		return $this->logo;
	}
	public function getContent() {
		return $this->content;
	}
	public function getExtra_disk() {
		return $this->extra_disk;
	}
	public function getExtra_pages() {
		return $this->extra_pages;
	}
	public function getAdv_seo() {
		return $this->adv_seo;
	}
	public function getCategory() {
		return $this->category;
	}
	public function getImage_gallary() {
		return $this->image_gallary;
	}
	public function getDomain() {
		return $this->domain;
	}
	public function getFavicon() {
		return $this->favicon;
	}
	public function getNamee() {
		return $this->namee;
	}
	public function getPhoneNumber() {
		return $this->phone_number;
	}
	public function getCustomerEmail() {
		return $this->customer_email;
	}

	
	public function getNotes() {
		return $this->notes;
	}
	public function getComapny_profile() {
		return $this->company_profile;
	}
	
	public function getDates() {
		return $this->dates;
	}

}
