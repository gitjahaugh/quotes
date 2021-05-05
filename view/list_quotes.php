<?php include('view/header.php'); ?>

<nav>
    <form action="." method="GET" id="make_selection">
        <section id="dropmenus" class="dropmenus">
            <select name="authorId">
                <option value="0">View All Authors</option>
                    <?php foreach ($authors as $author) : ?>
                    <?php if ($authorId == $author['id']) { ?>
                        <option value="<?= $author['id'] ?>" selected>
                    <?php } else { ?>
                        <option value="<?= $author['id'] ?>">
                    <?php } ?>
                        <?= $author['author'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <br>
            <select name="categoryId">
                <option value="0">View All Categories</option>
                    <?php foreach ($categories as $category) : ?>
                    <?php if ($categoryId == $category['id']) { ?>
                        <option value="<?= $category['id'] ?>" selected>
                    <?php } else { ?>
                        <option value="<?= $category['id'] ?>">
                    <?php } ?>
                        <?= $category['category'] ?>
                </option>
                <?php endforeach; ?>
            </select>
        </section>

        <section id="frm_buttons" class="frm_buttons">
            <div>
                <input type="submit" value="Submit" class="button green submit">
                <input id="resetQuoteForm" type="reset" class="button red reset">
            </div>
        </section>
    </form>
</nav>

<section>
    <?php if($quotes) { ?>
    <div id="table-overflow" class="table-overflow">
        <?php foreach ($quotes as $quote) : ?>
        <table>
            <thead>
                <tr>
                    <th colspan="2">"<?= $quote['quote']; ?>"</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="col"><?= $quote['author'] ?></td>
                    <td scope="col" class="category"><?= $quote['category'] ?></td>
                </tr>
            </tbody>
        </table>
        <?php endforeach; ?>
    </div>
    <?php } else { ?>
        <p>
            There are no quotes that match the selection.
        </p>
    <?php } ?>
</section>

<script defer src="js/main.js" type="text/javascript"></script>

<?php include('view/footer.php'); ?>