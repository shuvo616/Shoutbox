<?php /* $ () & # ! % @*/
include "lib/Database.php";

	class Shout{
		
		private $db;

		public function __construct(){
			$this->db = new Database();
		}
		//M1.Call to F1 from Database class.insert_shoutdata($_POST)
		public function getAllData(){
			$retrive_query = "SELECT * FROM  tbl_box ORDER BY id DESC";
			$result = $this->db->readData($retrive_query);
			return $result;
		}

		//M2.Call to F3 from Database class.
		public function insert_shoutdata($data){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$body = mysqli_real_escape_string($this->db->link, $data['body']);
			date_default_timezone_set('Asia/Dhaka'); //Process of setting time zone.
			$time = date('h:i:s a', time());

			$insert_query = "INSERT INTO tbl_box(name,body,time) VALUES('$name','$body','$time')";
			$this->db->insertData($insert_query);
			header("Location: index.php");
		}
	}
?>