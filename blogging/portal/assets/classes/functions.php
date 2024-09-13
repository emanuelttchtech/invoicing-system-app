<?php
 function createRandomPassword() {
        $chars = "003232303232023232023456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
        for($i; $i <= 30; $i++) {

          $num = rand() % 33;

          $tmp = substr($chars, $num, 1);

          $pass = $pass . $tmp;

 
        }
        return $pass;
      }
  $pass = createRandomPassword();
class SendEmails
{ 
	private $db;
	private $username;
	private $password;
	private $host;
	private $port;
	function __construct($db)
	{
		$this->db = $db;
		$this->username = "info@viconetgroup.com";
		$this->password = "_ENQDbaa0XMTXzL5d74U9OEGLPlIFBsa";
		$this->port = 587;
		$this->host = "mail.viconetgroup.com";
	}
	public function getUsername(){
		return $this->username;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getHost(){
		return $this->host;
	}
	public function getPort(){
		return $this->port;
	}
}

  class webinars
{
	private $db;
	protected $webinar_date;
	private $webinar_id;

	function __construct($db)
	{
		$this->db = $db;
	}
	function authorData($id)
	{
		$query = $this->db->prepare("SELECT * FROM content WHERE webinar_id = '$id' ");
		$query->execute();

		return $query;
	}
	function webinarsData()
	{
		$query = $this->db->prepare("SELECT * FROM webinars");
		$query->execute();

		return $query;
	}
}

/**
 * 
 */
class Candidates
{
	private $db;
	private $numCandi;
	function __construct($db)
	{
		$this->db = $db;

		//count candidates
		$query = $db->prepare("SELECT count(*) as num_candi from candidate_tbl");
		$query->execute();
		$row = $query->fetch();
		$this->numCandi = $row['num_candi'];
	}
	// count number of candidates per status
	public function countNumCand($status){
		$query = $this->db->prepare("SELECT count(*) as num_candi from candidate_tbl where c_verified = ?");
		$query->execute(array($status));
		$row = $query->fetch();
		return $row['num_candi'];
	}
	// count number of candidates per added By
	public function countNumCandPerAddedBy($status){
		$query = $this->db->prepare("SELECT count(*) as num_candi from candidate_tbl where added_by = ? and c_verified = 'verified'");
		$query->execute(array($status));
		$row = $query->fetch();
		return $row['num_candi'];
	}

	//count number of active candidates that were imported
	public function countNumActiveCandPerAddedBy($status){
		$query = $this->db->prepare("SELECT count(*) as num_candi from candidate_tbl where added_by = ? and c_verified = 'verified' and t_and_c !='' and popia_consent != ''");
		$query->execute(array($status));
		$row = $query->fetch();
		return $row['num_candi'];
	}
	//count number of Pending candidates that were imported
	public function countNumPendingCandPerAddedBy($status){
		$query = $this->db->prepare("SELECT count(*) as num_candi from candidate_tbl where added_by = ? and c_verified = 'verified' and t_and_c ='' and popia_consent = ''");
		$query->execute(array($status));
		$row = $query->fetch();
		return $row['num_candi'];
	}
	public function candidateData()
	{
		$query = $this->db->prepare("SELECT * FROM candidate_tbl");
		$query->execute();

		return $query;
	}
	public function candidateDataByAddedBy($addedBy)
	{
		$query = $this->db->prepare("SELECT * FROM candidate_tbl where added_by= ? and popia_consent ='' and t_and_c =''");
		$query->execute(array($addedBy));

		return $query;
	}
	//Increment number of reminder 
	public function incrementNumRem($email){
		$query = $this->db->prepare("UPDATE candidate_tbl SET num_reminder = num_reminder +1 where c_email = ?");
		$query->execute(array($email));
	}
	public function getCandCv($email){

	}
	public function getNumReminder($email){
		$query = $this->db->prepare("SELECT num_reminder FROM candidate_tbl where md5($c_email) = ?");
		$query->execute(array($email));
		$row = $query->fetch();

		return $row['num_reminder'];
	}
		
	
	function getNumCandi(){
		return $this->numCandi;
	}
}
/**
 * 
 */
class Staff
{
	private $db;
	private $id;
	protected $surname;
	protected $name;
	protected $email;
	protected $cellNo;
	protected $pos;
	private $numStaff;
	protected $profilePic;

	function __construct($db)
	{
		$this->db = $db;

		//count staff
		$query = $db->prepare("SELECT count(*) as num_staff from staff");
		$query->execute();
		$row = $query->fetch();
		$this->numStaff = $row['num_staff'];
	}
	function setStaffData($email)
	{
		$query = $this->db->prepare("SELECT * FROM staff WHERE md5(s_email) = '$email'");
		$query->execute();
		for($i = 0; $row = $query->fetch();$i++){
		$this->surname = $row['s_last_name'];
		$this->name = $row['s_first_name'];
		$this->email=$row['s_email'];
		$this->cellNo = $row['s_cell_number'];
		$this->id = $row['s_id'];
		$this->pos = $row['s_position'];
		$this->profilePic = $row['profile_pic'];

		}
	}
	function getStaffData(){
		$query = $this->db->prepare("SELECT * FROM staff");
		$query->execute();

		return $query;
	}
	function getSurname(){
		return $this->surname;
	}
	function getName(){
		return $this->name;
	}
	function getEmail(){
		return $this->email;
	}
	function getCell(){
		return $this->cellNo;
	}
	function getID(){
		return $this->id;
	}
	function getPos(){
		return $this->pos;
	}
	function getNumStaff(){
		return $this->numStaff;
	}
	public function getPP(){
		return $this->profilePic;
	}
}
class LandingPage
{
	private $db;
	private $title;
	private $landingPic;
	private $landingContent;
	function __construct($db)
	{
		$this->db = $db;

		//Get data from database and assign it to variables
		$query = $this->db->prepare("SELECT * FROM landing_page WHERE id = 1");
		$query->execute();
		
		while ($row = $query->fetch()) {
			$this->title = $row['l_title'];
			$this->landingContent = $row['l_content'];
			$this->landingPic = $row['l_image'];
		}

	}
	
	function getTitle(){
		return $this->title;
	}
	function getImg(){
		return $this->landingPic;
	} 
	function getContent()
	{
		return $this->landingContent;
	}
}

/**
 * 
 */
class Insight
{
	private $db;
	private $metaTitle;
	private $metaDesc;
	private $title;
	private $author;
	private $content;
	private $date;
	private $picture;
	function __construct($db)
	{
		$this->db = $db;
	}
	public function getInsights(){
		$query = $this->db->prepare("SELECT * FROM insight");
		$query->execute();
		return $query;
	}
	public function setInsight($id)
	{
		$query = $this->db->prepare("SELECT * FROM insight where md5(id) ='$id'");
		$query->execute();
		$row = $query->fetch();
		$this->metaTitle = $row['meta_title'];
		$this->metaDesc = $row['meta_desc'];
		$this->title = $row['insight_title'];
		$this->author = $row['insight_author'];
		$this->content = $row['insight_content'];
		$this->date = $row['insight_date'];
		$this->picture = $row['insight_img'];
	}
	public function getMetaTitle(){
		return $this->metaTitle;
	}
	public function getMetaDesc(){
		return $this->metaDesc;
	}
	public function getTitle()
	{
		return $this->title;
	}
	public function getAuthor()
	{
		return $this->author;
	}
	public function getContent(){
		return $this->content;
	}
	public function getDate(){
		return $this->date;
	}
	public function getImage(){
		return $this->picture;
	}

}
/**
 * 
 */ 
class Corporates
{
	
	private $db;
	function __construct($db)
	{
		$this->db = $db;	
	}
	public function getCorporates(){
		$query = $this->db->prepare("SELECT * FROM corporate");
		$query->execute();
		return $query;
	}
	public function getCorporateUser($compEmail){
		$query = $this->db->prepare("SELECT * FROM users WHERE company_email = '$compEmail' and added_by='System'");
		$query->execute();
		return $query;
	}
	public function updateCorporates($status,$email){
		$query = $this->db->prepare("UPDATE corporate SET status='$status' WHERE company_email='$email' ");
		$query->execute();
		return $query;
	}
	public function updateUser($pass,$email){
		$query = $this->db->prepare("UPDATE users SET password='$pass' WHERE user_email='$email' ");
		$query->execute();
		return $query;
	}
	public function getNumCorporates(){
		$query = $this->db->prepare("SELECT count(company_email) as num_rows FROM corporate");
		$query->execute();
		$row = $query->fetch();
		return $row['num_rows'];
	}
}
class Packages{
	private $db;
	function __construct($db)
	{
		$this->db = $db;	
	}
	public function getAllPackages(){
		$query = $this->db->prepare("SELECT * FROM packages");
		$query->execute();
		return $query;
	}
	//Create package_id
	private function createPackageId()
	{
		$i = 0;
		$x = 1;
		for($i ;$i != $x ; $i++)
		{
		$query = $this->db->prepare("SELECT *, count(package_id) as num_rows FROM packages");
		$query->execute();
		$row = $query->fetch();
		$num_rows = $row['num_rows'];
		//if($pack_id )
		$pack_id = 'vicopac'.$num_rows+$x;
		$query = $this->db->prepare("SELECT count(package_id) as num_rows FROM packages WHERE package_id = '$pack_id'");
		$query->execute();
		$row_ = $query->fetch();
		$num_rows_ = $row_['num_rows'];
		if($num_rows_ > 0){
			$x += 1;
		}
		else{
			return $pack_id;
			//$i += 1;
		}
	}
	}
	//Add package to database
		public function addPackages($package_name_,$package_desc_,$num_users_,$package_duration_,$package_price_)
	{
		$package_id = $this->createPackageId();
		$query = $this->db->prepare("INSERT INTO `packages`(`package_id`, `package_name`, `package_desc`, `num_users`, `package_duration`, `package_price`) VALUES (?,?,?,?,?,?)");
		$query->execute(array($package_id,$package_name_,$package_desc_,$num_users_,$package_duration_,$package_price_));
	}
	public function editPackage($package_id_,$package_name_,$package_desc_,$num_users_,$package_duration_,$package_price_)
	{
		$query = $this->db->prepare("UPDATE `packages` SET `package_name`=?,`package_desc`=?,`num_users`=?,`package_duration`=?,`package_price`=? WHERE `package_id`=? ");
		$query->execute(array($package_name_,$package_desc_,$num_users_,$package_duration_,$package_price_,$package_id_));

	}
}
?>