<?php

Class Message extends Model {

	public function save($data, $id = null)
	{
		if (!isset($data['name']) || !isset($data['email']) || !isset($data['message'])) 
		{
			return false;
		}

		$id = (int)$id;
		$name = $data['name'];
		$email = $data['email'];
		$message = $data['message'];

		if (!$id) 
		{
			$sql = "INSERT INTO messages SET name = '$name', email = '$email', message = '$message'";
		}
		else
		{
			$sql = "UPDATE messages SET name = '$name', email = '$email', message = '$message' WHERE id = $id";
		}

		return $this->db->query($sql);
	}
}
