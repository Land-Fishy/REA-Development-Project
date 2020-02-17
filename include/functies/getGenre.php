<?php
	function getGenre($db){
		$query = 'SELECT id, genre FROM genres';
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
?>