<?php

//get all catgeories
function get_categories() {
  global $db;
  $query = 'SELECT * FROM Categories';
  $statement = $db->prepare($query);
  $statement->execute();
  $all_categories = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor();
  return $all_categories;
  }

  ?>
