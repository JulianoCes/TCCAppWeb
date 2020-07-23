<?php
	class Usuario 
	{
		public function login($emailusu, $senhausu){
			global $pdo;

			$sql = "SELECT * FROM usuario WHERE emailusu = :emailusu AND senhausu = :senhausu";
			$sql = $pdo->prepare($sql);
			$sql->bindValue("emailusu",$emailusu);
			$sql->bindValue("senhausu",$senhausu);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$dado = $sql->fetch();

				$SESSION['username'] = $dado['username'];

				return true;

			}else{
				return false;
			}

		}
	}


?>