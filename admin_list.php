<?php 
  require_once('util/valid_admin.php');
  include 'view/admin_header.php';?>
<br>
<br><br><br><br>
<br>
<h4>Select your search criteria:</h4>
<div id="dropdowns">
    <form action="admin.php" method="GET" id="quote_filters">
      <div id="authorID_dropdown">
        <select name="authorID" class="custom-select my-1    mr-sm-2" >
          <option  value="" selected>View by Authors</option>
          <?php foreach ($all_authors as $all_author) : ?>
          <option value="<?php echo $all_author['authorID'];?>"><?php echo $all_author['author']; ?></option>
          <?php endforeach; ?>
          <option value="">View Quotes from All Authors</option>
        </select>
      </div>

      <div id="type_dropdown">
        <select name="categoryID" class="custom-select my-1 mr-sm-2">
          <option value="" selected>View by Category</option>
          <?php foreach ($all_categories as $all_category) : ?>
          <option value="<?php echo $all_category['categoryID'];?>"><?php echo $all_category['category']; ?></option>
          <?php endforeach; ?>
          <option value="">View Quotes in All Categories</option>
        </select>
      </div>

          </div>

        <div id="submit">
          <input class="btn btn-primary" type="submit" value="Submit">
        </div>
    </form>
</section>

            <hr>
            <br>
      
<section>
         <?php if (!isset($emptyArray)) {?>
                <div id="table-overflow">
                    <table>
                        <thead>
                            <tr> 
                                <th>Category</th>
                                <th>Quote</th>
                                <th>Author</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
         <?php } ?>

                           <?php if (isset($approved_quotes)) { 
                                foreach ($approved_quotes as $approved_quote) : ?>
                            <tr>
                              <td class="hideID"><?php echo $approved_quote['quoteID']; ?></td>
                              <td class="main"><?php echo $approved_quote['category']; ?></td>
                              <td class="main">"<?php echo $approved_quote['quote']; ?>"</td>
                              <td class="main"><?php echo $approved_quote['author']; ?></td>
                              <td><form action="admin.php" method="post">
                                    <input type="hidden" name="action" value="delete_quote">
                                    <input type="hidden" name="quoteID"
                                        value="<?php echo $approved_quote['quoteID']; ?>">
                                    <input type="submit" value="Remove" class="button red">
                                </form></td>
                            </tr>
                          <?php endforeach;} ?>



                         <?php  global $emptyArray;
                                if (isset($emptyArray)) {?>
                                <tr><p><?php echo $emptyArray;?></p></tr>
                                <?php
                                } else { if (isset($auth_cat_quotes)) {
                                foreach ($auth_cat_quotes as $auth_cat_quote) : ?>
                            <tr>
                              <td class="hideID"><?php echo $auth_cat_quote['quoteID']; ?></td>
                              <td class="main"><?php echo $auth_cat_quote['category']; ?></td>
                              <td class="main">"<?php echo $auth_cat_quote['quote']; ?>"</td>
                              <td class="main"><?php echo $auth_cat_quote['author']; ?></td>
                              <td><form action="admin.php" method="post">
                                    <input type="hidden" name="action" value="delete_quote">
                                    <input type="hidden" name="quoteID"
                                        value="<?php echo $auth_cat_quote['quoteID']; ?>">
                                    <input type="submit" value="Remove" class="button red">
                                </form></td>
                            </tr>
                          <?php endforeach;}} ?>

                          <?php if (isset($cat_quotes)) { 
                                foreach ($cat_quotes as $cat_quote) : ?>
                            <tr>
                              <td class="hideID"><?php echo $cat_quote['quoteID']; ?></td>
                              <td class="main"><?php echo $cat_quote['category']; ?></td>
                              <td class="main">"<?php echo $cat_quote['quote']; ?>"</td>
                              <td class="main"><?php echo $cat_quote['author']; ?></td>
                              <td><form action="admin.php" method="post">
                                    <input type="hidden" name="action" value="delete_quote">
                                    <input type="hidden" name="quoteID"
                                        value="<?php echo $cat_quote['quoteID']; ?>">
                                    <input type="submit" value="Remove" class="button red">
                                </form></td>
                            </tr>
                          <?php endforeach;} ?>
                            
                          <?php if (isset($auth_quotes)) { 
                                foreach ($auth_quotes as $auth_quote) : ?>
                            <tr>
                              <td class="hideID"><?php echo $auth_quote['quoteID']; ?></td>
                              <td class="main"><?php echo $auth_quote['category']; ?></td>
                              <td class="main">"<?php echo $auth_quote['quote']; ?>"</td>
                              <td class="main"><?php echo $auth_quote['author']; ?></td>
                              <td><form action="admin.php" method="post">
                                    <input type="hidden" name="action" value="delete_quote">
                                    <input type="hidden" name="quoteID"
                                        value="<?php echo $auth_quote['quoteID']; ?>">
                                    <input type="submit" value="Remove" class="button red">
                                </form></td>
                            </tr>
                          <?php endforeach;} ?>

                        </tbody>
                    </table>
                </div>
                                
                 
                                  
        </section>
<br>
        <?php include 'view/footer.php';?>
