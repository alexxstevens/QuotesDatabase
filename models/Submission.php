<?php



// query all approved quotes
function view_approved_quotes() {
  global $db;
  global $authorID;
  global $categoryID;
  if ($authorID == NULL && $categoryID == NULL) { 
  $query = 'SELECT 
              q.quoteID,
              q.quote,
              a.author,
              c.category
            FROM Quotes q
            LEFT JOIN Authors a ON q.authorID = a.authorID
            LEFT JOIN Categories c ON q.categoryID = c.categoryID
            WHERE q.StatusCode = "a"';
  $statement = $db->prepare($query);
  $statement->execute();
  $approved_quotes = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor();
  return $approved_quotes;
  }}

//Query by AuthorID and CategoryID
function view_by_author_category() {
  global $db;
  global $authorID;
  global $categoryID;
  if ($authorID != NULL && $categoryID != NULL) { 
  $query = 'SELECT  
              q.quoteID,
              q.quote,
              a.author,
              c.category
            FROM Quotes q
            LEFT JOIN Authors a ON q.authorID = a.authorID
            LEFT JOIN Categories c ON q.categoryID = c.categoryID
            WHERE q.StatusCode = "a"
            AND a.authorID = :authorID
            AND c.categoryID = :categoryID';
  $statement = $db->prepare($query);
  $statement->bindValue(':authorID', $authorID);
  $statement->bindValue(':categoryID', $categoryID);
  $statement->execute();
  $auth_cat_quotes = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor();
  return $auth_cat_quotes;}}

  // if ($auth_cat_quotes == FALSE) {
  //          $emptyQuery = "There are no quotes matching your search criteria.";
  //          return $emptyQuery;
  //       }}


//Query all by categoryID
function view_by_category() {
  global $db;
  global $categoryID;
  global $auth_cat_quotes;
    if (empty($categoryID)) {
      return; }
    $query = 'SELECT  
                q.quoteID,
                q.quote,
                a.author,
                c.category
              FROM Quotes q
              LEFT JOIN Authors a ON q.authorID = a.authorID
              LEFT JOIN Categories c ON q.categoryID = c.categoryID
              WHERE q.StatusCode = "a"
              AND c.categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();
    $cat_quotes = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $cat_quotes;}


//Query all by authorID
function view_by_author() {
  global $db;
  global $authorID;
  global $auth_cat_quotes;
    if (empty($authorID)) { 
      return; }
    $query = 'SELECT 
                q.quoteID,
                q.quote,
                a.author,
                c.category
              FROM Quotes q
              LEFT JOIN Authors a ON q.authorID = a.authorID
              LEFT JOIN Categories c ON q.categoryID = c.categoryID
              WHERE q.StatusCode = "a"
              AND a.authorID = :authorID';
    $statement = $db->prepare($query);
    $statement->bindValue(':authorID', $authorID);
    $statement->execute();
    $auth_quotes = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $auth_quotes;
    }

//Query Random Quote
function view_random() {
  global $db;
  global $authorID;
  global $limit;
  if (empty($authorID)) { 
    return; }
  if (empty($limit)) {
     return; }
  $query = 'SELECT
              q.quoteID,
              q.quote,
              a.author,
              c.category
            FROM Quotes q
            LEFT JOIN Authors a ON q.authorID = a.authorID
            LEFT JOIN Categories c ON q.categoryID = c.categoryID
            WHERE q.StatusCode = "a"
            ORDER BY Rand() LIMIT '. $limit .' ';
  $statement = $db->prepare($query);
  $statement->execute();
  $random_quotes = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor();
  return $random_quotes;
}


// create quote submission
function submit_quote() {
  global $db;
  global $authorID;
  global $categoryID;
  global $quote;
  if (empty($authorID)) { 
    return; }
  if (empty($categoryID)) { 
    return; }
  if (empty($quote)) { 
    return; }
  $query = 'INSERT INTO Quotes (authorID,categoryID,quote,StatusCode)
            VALUES (:authorID, :categoryID, :quote, "a")';
  $statement = $db->prepare($query);
  $statement->bindValue(':authorID', $authorID);
  $statement->bindValue(':categoryID', $categoryID);
  $statement->bindValue(':quote', $quote);
  $statement->execute();
  $statement->closeCursor();
}




?>






