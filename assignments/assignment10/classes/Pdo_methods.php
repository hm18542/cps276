<?php

//the class extends the database connection class and build on it with pdo methods commands
//extends databasconnection class 
require_once "Db_conn.php";
class PdoMethods extends DatabaseConn {

	private $sth;
	private $conn;
	private $db;
	private $error;

	//make it binding. the script takes the sql statements the binding array as the parameters and performs the query. 
    //run the query and return the result as an array or an error string 

    public function selectBinded($sql, $bindings){
		$this->error = false;

        //try and catch statments to catch errors and returns an error message.
		//only for the fatal error to display, then comment out the try catch statement 
        try{
			$this->db_connection();
			$this->sth = $this->conn->prepare($sql);
			$this->createBinding($bindings);
			$this->sth->execute();
		}
		catch(PDOException $e){
			
			//output the error message: 
            echo $e->getMessage();
			return 'error';
			
		}
		//cloases the databaseconn
		$this->conn = null;
		//returns a record set
		return $this->sth->fetchAll(PDO::FETCH_ASSOC);
			
	}
    //this time for no need of any binded parameters and none are passed
	public function selectNotBinded($sql){
			$this->error = false;
			//try catch statement for carch errors and returns an error message.
				$this->db_connection();
				$this->sth = $this->conn->prepare($sql);
				$this->sth->execute();
			}
			catch (PDOException $e){
				//output the error message
				echo $e->getMessage();
				return 'error';
			}
			//closes databseconn
			$this->conn = null;
			//returns the record set
			return $this->sth->fetchAll(PDO::FETCH_ASSOC);

		}
    //all the rest:create,update,delete
	public function otherBinded($sql, $bindings){
		$this->error = false;
		
		//A TRY CATCH BLOCK
		
		try{
			$this->db_connection();
			$this->sth = $this->conn->prepare($sql);
			$this->createBinding($bindings);
			$this->sth->execute();
		}
		catch(PDOException $e) {
			//output the error message
			echo $e->getMessage();
			return 'error';
		}

		//close the dbconn
		$this->conn = null;

		//no error = everything worked 
		return 'noerror';
	}

	public function otherNotBinded($sql){
		$this->error = false;
			
			//try catch block

			try{
				$this->db_connection();
				$this->sth = $this->conn->prepare($sql);
				$this->sth->execute();
			}
			catch (PDOException $e){
				//output the error message
				echo $e->getMessage();
				return 'error';
			}
			
			//close the db conn
			$this->conn = null;
			
			//return noerror
			return 'noerror';

	}

	//a connection to the db
	private function db_connection(){
		$this->db = new DatabaseConn();
		$this->conn = $this->db->dbOpen();
	}

	//create binding
	private function createBinding($bindings){
		foreach($bindings as $value){
			switch($value[2]){
				case "str" : $this->sth->bindParam($value[0],$value[1], PDO::PARAM_STR);
				case "int" : $this->sth->bindParam($value[0],$value[1], PDO::PARAM_INT);
			}
		}
	}
}