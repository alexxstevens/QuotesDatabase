<?php include 'view/header.php'; ?>
<br><br><br><br>
    <main>
        <BR>
        <h2 class="contact-container">Join our Quotes! the database family.  Submit a Quote for Approval!</h2><br>
         <div class="contact-container">
            <form action="index.php" method="get" id="submit_quote_form">
                <input type="hidden" name="action" value="submit_quote">
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
                <input type="submit" value="Submit Quote" class="btn btn-primary"><br>
                </div>
            </form>
        </div>
<br>
        <div>
            <p><a class="link" href="index.php?action=show_quotes">Return to Quotes! the database</a></p>
        </div>
        <br>
    </main>

<?php include 'view/footer.php'; ?>



