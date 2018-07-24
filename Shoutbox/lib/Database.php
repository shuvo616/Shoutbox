<?php /* $ () & # ! % @*/
	include_once "config.php";

	class Database{

		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASS;
		public $name = DB_NAME;

		public $link;
		public $error;

		public function __construct(){
			$this->connectDB();
		}

		//F1.Database Connection.
		private function connectDB(){
			$this->link = new mysqli($this->host,$this->user,$this->pass,$this->name);
			if (!$this->link) {
				$this->error = "Connection Error".$this->link->connect_error;
				return false;
			}
		}
		//F2.Read Data.
		public function readData($receive_query){
			$result = $this->link->query($receive_query) or die($this->link->error.__LINE__);
			if ($result->num_rows > 0) {
				return $result;
			}else{
				return false;
			}
		}
		//F3.Create or Insert Data.
		public function insertData($receive_query){
			$insert_row = $this->link->query($receive_query) or die($this->link->error.__LINE__);
			if ($insert_row) {
				return $insert_row;
			} else {
				return false;
			}	
		}
		//F4.Update Data.
		public function updateData($receive_query){
			$update_row = $this->link->query($receive_query) or die($this->link->error.__LINE__);
			if ($update_row) {
				return $update_row;
			} else {
				return false;
			}	
		}

		//F5.Delete Data.
		public function deleteData($receive_query){
			$delete_row = $this->link->query($receive_query) or die($this->link->error.__LINE__);
			if ($delete_row) {
				return $delete_row;
			} else {
				return false;
			}	
		}
	}
?>