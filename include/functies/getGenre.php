<?php
	function getGenre($db){
		$query = 'SELECT id, genre FROM genres';
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	function getGenreId($db, $id){
		$query = 'SELECT id, genre FROM genres WHERE id = $id';
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}