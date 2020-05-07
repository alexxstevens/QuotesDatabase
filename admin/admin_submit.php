<?php  
  require_once('../util/valid_admin.php');
  include('../view/admin_header.php');
?>
<br><br><br><br>

    <main>
        <BR>
        <h2 class="contact-container">Add Quote</h2><br>
         <div class="contact-container">
            <form action="admin.php" method="get" id="submit_quote_form">
                <input type="hidden" name="action" value="add_quote">
                <label>Author:*</label><br>
                <select name="authorID">
                <?php foreach ($all_authors as $all_author) : ?>
                    <option value="<?php echo $all_author['authorID']; ?>">
                        <?php echo $all_author['author']; ?>
                    </option>
                <?php endforeach; ?>
                </select><br>
                <label>Category:*</label><br>
                <select name="categoryID">
                <?php foreach ($all_categories as $all_category) : ?>
                    <option value="<?php echo $all_category['categoryID']; ?>">
                        <?php echo $all_category['category']; ?>
                    </option>
                <?php endforeach; ?>
                </select><br>            

                <label>Quote: *</label><br>
                <textarea id="message" name="quote" placeholder="Quote.." style="height:200px" required></textarea><br>

                  <p>* required</p>

                <div id="submit">
                <label>&nbsp;</label>
                <input type="submit" value="Add Quote" class="btn btn-primary"><br>
                </div>
            </form>
        </div>
<br>
        <div>
            <p><a class="link" href="admin.php?action=show_quotes">Return to Quotes! the database</a></p>
        </div>
        </main>

<?php include '../view/footer.php'; ?>



