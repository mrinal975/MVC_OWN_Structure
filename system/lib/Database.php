<?php
/**
* Databse
*/
class Database  extends PDO
{
	
	public function __construct($dsn,$user,$pass)
	{
		parent::__construct($dsn,$user,$pass);
	}


//fetch data
	public function select($sql,$data=array(),$fetchStyle=PDO::FETCH_ASSOC){
		$stmt=$this->prepare($sql);

		//print_r($data);
		foreach ($data as $key => $value) {
			$stmt->bindValue("$key","$value");
		}
		$stmt->execute();
		return  $stmt->fetchAll($fetchStyle);
	}

//insert data
	public function insert($table,$data){
		$keys=implode(",",array_keys($data));
		$values=":".implode(", :",array_keys($data));
		$sql="INSERT INTO $table($keys) VALUES($values)";
		$stmt=$this->prepare($sql);
		foreach ($data as $key => $value) {
			$stmt->bindValue(":$key","$value");
		}
		return $stmt->execute();
		//print_r($data);
	}

//update Information
	public function update($table,$data,$cond){
		$updateKey=null;
		foreach ($data as $key => $value) {
			$updateKey .="$key=:$key,";
		}
		//echo $updateKey;
		$updateKey=rtrim($updateKey,",");
		$sql="UPDATE $table SET $updateKey WHERE $cond";
		// echo $sql;
		$stmt=$this->prepare($sql);
		foreach ($data as $key => $value) {
			$stmt->bindValue(":$key","$value");
			// echo $m;
			//print_r($m);
		}
		return $stmt->execute();

	}
	
//Delete Information
	public function delete($table,$cond,$limit=1){
		$sql="DELETE FROM $table WHERE $cond LIMIT $limit";
		//echo $sql;
		return $this->exec($sql);
	}

//check if user exist
	public function affectedRows($sql,$username,$password){
		$stmt=$this->prepare($sql);
		$stmt->execute(array($username,$password));
		return $stmt->rowCount();
	}

//fatch user data
	public function selectUser($sql,$username,$password){
		$stmt=$this->prepare($sql);
		$stmt->execute(array($username,$password));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>