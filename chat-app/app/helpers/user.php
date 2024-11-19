<?php  

function getUser($userid, $conn){
   $sql = "SELECT * FROM profile 
           WHERE userid=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$userid]);

   if ($stmt->rowCount() === 1) {
   	 $user = $stmt->fetch();
   	 return $user;
   }else {
   	$user = [];
   	return $user;
   }
}