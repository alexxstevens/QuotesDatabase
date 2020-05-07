<?php 
  require_once('../util/valid_admin.php');
  include '../view/admin_header.php';?>
<br>
<br><br>
<br><br><br><br>
<h4>Quotes Submitted for Approval:</h4>
<br>
      
<section>
         <?php if (!empty($submitted_quotes)) {?>
                <div id="table-overflow">
                    <table>
                        <thead>
                            <tr> 
                                <th>Category</th>
                                <th>Quote</th>
                                <th>Author</th>
                                <th>Approve</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
         <?php } ?>

                           <?php if (empty($submitted_quotes)) { ?>
                             <p>No Results Available</p>
                           <?php } else if (!empty($submitted_quotes)) {
                                foreach ($submitted_quotes as $submitted_quote) : ?>
                            <tr>
                              <td class="hideID"><?php echo $submitted_quote['quoteID']; ?></td>
                              <td class="main"><?php echo $submitted_quote['category']; ?></td>
                              <td class="main">"<?php echo $submitted_quote['quote']; ?>"</td>
                              <td class="main"><?php echo $submitted_quote['author']; ?></td>
                              <td><form action="admin.php" method="post">
                                    <input type="hidden" name="action" value="approve_quote">
                                    <input type="hidden" name="quoteID"
                                        value="<?php echo $submitted_quote['quoteID']; ?>">
                                    <input type="submit" value="Approve">
                                </form></td>
                              <td><form action="admin.php" method="post">
                                    <input type="hidden" name="action" value="delete_submission">
                                    <input type="hidden" name="quoteID"
                                        value="<?php echo $submitted_quote['quoteID']; ?>">
                                    <input type="submit" value="Remove" class="button red">
                                  </form>
                              </td>
                            </tr>
                          <?php endforeach;} ?>

                        </tbody>
                    </table>
                </div>
                                
                 
                                  
        </section>
<br><br><br><br><br><br><br><br><br><br><br><br>
        <?php include '../view/footer.php';?>
