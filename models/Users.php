<?php 

function add_admin($username, $password) {
  global $db;
  global $username;
  global $password;
  $hash = password_hash ($password, PASSWORD_DEFAULT);
  $query = 'INSERT INTO  Users (username, password) VALUES (:username, :password)';
  $statement = $db->prepare($query);
  $statement->bindValue(':username', $username);
  $statement->bindValue(':password', $hash);
  $statement->execute();
  $statement->closeCursor();
}

function is_valid_admin_login($username, $password) {
  global $db;
  global $username;
  global $password;
  $query = 'SELECT password FROM Users WHERE username = :username';
  $statement = $db->prepare($query);
  $statement->bindValue(':username', $username);
  $statement->execute();
  $row = $statement->fetch();
  $statement->closeCursor();
  if(!empty($row['password'])) {
  $hash = $row['password'];
  return password_verify($password, $hash);}
}


function check_username($username) {
    global $db;
    global $username;
    global $password;
    $query = 'SELECT username FROM Users WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->execute(array('username'=>$username));
    $checkusername = $statement->fetchColumn();
    return $checkusername;
    }
?>