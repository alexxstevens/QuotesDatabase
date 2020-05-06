<?php 
    require_once('../util/valid_admin.php');
    include('../view/admin_header.php')
?>
<br><br><br>
<main>
    <h2>Authors</h2>
    <section>
        <?php if (!empty($all_authors)) { ?>
            <table>
                <tr>
                    <th colspan="2">Name</th>
                </tr>        
                <?php foreach ($all_authors as $all_author) : ?>
                <tr>
                    <td><?php echo $all_author['author']; ?></td>
                    <td>
                        <form action="admin.php" method="post">
                            <input type="hidden" name="action" value="delete_author">
                            <input type="hidden" name="authorID"
                                value="<?php echo $all_author['authorID']; ?>"/>
                            <input type="submit" value="Remove" class="button red" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>    
            </table>
        <?php } else { ?>
            <p>
                There are no authors in your database.
            </p>
        <?php } ?>
    </section>

    <section>
        <h2>Add Author</h2>
        <form action="admin.php" method="post" id="add_author">
            <input type="hidden" name="action" value="add_author">

            <label>Name:</label>
            <input type="text" name="author" max="50" required><br>

            <label id="blankLabel">&nbsp;</label>
            <input id="add_author_button" type="submit" class="button blue" value="Add Author"><br>
        </form>
    </section>

<br><br>
     <h2>Categories</h2>
    <section>
        <?php if ( sizeof($all_categories) != 0) { ?>
            <table>
                <tr>
                    <th colspan="2">Name</th>
                </tr>        
                <?php foreach ($all_categories as $all_category) : ?>
                <tr>
                    <td><?php echo $all_category['category']; ?></td>
                    <td>
                        <form action="admin.php" method="post">
                            <input type="hidden" name="action" value="delete_category">
                            <input type="hidden" name="categoryID"
                                value="<?php echo $all_category['categoryID']; ?>"/>
                            <input type="submit" value="Remove" class="button red" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>    
            </table>
        <?php } else { ?>
            <p>
                There are no categories in your database.
            </p>
        <?php } ?>
    </section>

    <section>
        <h2>Add Author</h2>
        <form action="admin.php" method="post" id="add_category">
            <input type="hidden" name="action" value="add_category">

            <label>Name:</label>
            <input type="text" name="category" max="50" required><br>

            <label id="blankLabel">&nbsp;</label>
            <input id="add_category_button" type="submit" class="button blue" value="Add Category"><br>
        </form>
    </section>
    <?php include '../view/footer.php'; ?>
</main>