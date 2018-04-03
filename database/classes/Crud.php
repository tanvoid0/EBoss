<?php
include_once 'DbConfig.php';

class Crud extends DbConfig
{
	public function __construct()
	{
		parent::__construct();
	}

    public function todo($query){
        $result = $this->connection->query($query);

        if(!$result){
            echo 'Error: Cannot Search The data';
            return false;
        }
        $row = $result->fetch_assoc();
        return $row;
    }

	public function show($query){
        $result = $this->connection->query($query);
        if(!$result){
            return false;
        }
        $rows = array();
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $result;
    }

	public function count($table){
		$query = "SELECT * FROM ".$table;
		$result = $this->connection->query($query);
		if(!$result){
			return false;
		}
		$row = mysqli_num_rows($result);
		return $row;
	}

	public function distinct($table, $column, $id){
		$query ="SELECT DISTINCT $column FROM $table WHERE id <> $id";
		$result = $this->connection->query($query);
		if(!$result){
			return false;
		}
		$rows = array();
		while ($row = $result->fetch_assoc()){
			$rows[] = $row[$column];
		}
		return $result;
	}

	public function rank($id) {
		$query = "SELECT MIN(title) as title from member WHERE user_id = $id";
		$result = $this->connection->query($query);
		if(!$result){
			return false;
		}
		$row = $result->fetch_assoc();
		return $row;
	}

	public function select($table){
		$query = "SELECT * FROM $table";
		$result = $this->connection->query($query);
		if (!$result){
			return false;
		}
		$rows = array();

		while ($row = $result->fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}
    public function notselect($table, $column, $id){
        $query = "SELECT * FROM ".$table." WHERE ".$column." <> ".$id;
        $result = $this->connection->query($query);
        if (!$result){
            return $result;
        }
        $rows = array();

        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }

	public function insert($table, $into, $values){
		$query = "INSERT INTO ".$table." (".$into.") VALUES (".$values.")";
		$result = $this->connection->query($query);
		if(!$result){
			echo 'Error: Cannot Insert The data';
			return false;
		} else {
			return true;
		}
	}

	public function search($table, $column, $id){
		// echo 'Working';
		$query = "SELECT * FROM ".$table." WHERE ".$column."=".$id."";
		$result = $this->connection->query($query);

		if(!$result){
			echo 'Error: Cannot Search The data';
			return false;
		}
    $row = $result->fetch_assoc();
		return $row;
	}

	public function edit($id){
		// echo 'Working';
		$query = "SELECT * FROM member WHERE project_id = $id";
		$result = $this->connection->query($query);

		if(!$result){
			echo 'Error: Cannot Search The data';
			return false;
		}
    $row = $result->fetch_assoc();
		return $row;
	}

	public function getData($query)
	{
		$result = $this->connection->query($query);

		if ($result == false) {
			return false;
		}

		$rows = array();

		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}

		return $rows;
	}

	public function execute($query)
	{
		$result = $this->connection->query($query);

		if ($result == false) {
			echo 'Error: cannot execute the command';
			return false;
		} else {
			return true;
		}
	}

	public function delete($table, $id)
	{
		$query = "DELETE FROM $table WHERE id= $id";

		$result = $this->connection->query($query);

		if ($result == false) {
			echo 'Error: cannot delete id ' . $table  . ' from table ' .$id;
			return false;
		} else {
			return true;
		}
	}

	public function escape_string($value)
	{
		return $this->connection->real_escape_string($value);
	}

	public function login($table, $user, $password){
		$query = "SELECT * FROM $table WHERE user='$user' and password = '$password'";
		$result = $this->connection->query($query);

		if(!$result){
			return false;
		}
		$row = $result->fetch_assoc();

		return $row;
	}

	public function getManager($id){
    $query = "SELECT * FROM user WHERE id=(SELECT user_id FROM member WHERE project_id=".$id." and title = 2)";
		$result = $this->connection->query($query);

		if(!$result){
			return false;
		}
		$row = $result->fetch_assoc();

		return $row;
    }

	public function getMember($id){
        $query = "SELECT * FROM user WHERE id in (SELECT member.user_id FROM member WHERE member.project_id=$id and title =3) ORDER BY name";
        $result = $this->connection->query($query);

        if ($result == false) {
            return false;
        }
        return $result;
    }
}
?>
