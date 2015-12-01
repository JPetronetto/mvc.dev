<?php

CLass Page extends Model {

	public function getList($onlyPublished = false)
	{
		$sql = "SELECT * FROM pages";

		if ($onlyPublished) 
		{
			$sql .= " WHERE is_published = 1";
		}

		return $this->db->query($sql);
	}

	public function getByAlias($alias)
	{
		$sql = "SELECT * FROM pages WHERE alias = '$alias' LIMIT 1";
		$result = $this->db->query($sql);

		return isset($result[0]) ? $result[0] : null;
	}
}