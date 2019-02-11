
<div class="container" style="margin-left: 50px;">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php if (empty($books)): ?>
                <p>Список книг пуст</p>
            <?php else: ?>
                <?php foreach ($books as $val): ?>
                    <div class="post-preview">
                        <a href="/library/book/book_id:<?php echo $val['book_id']; ?>">
                            <h class="post-title"><?php echo $val['title']; ?></h>
                            
                        </a>
                        <a href="/library/bookdelete/book_id:<?php echo $val['book_id']; ?>">
                            <button class="btn btn-danger" style="margin-left: 3px;">Del</button>
                        </a>
                        <a href="/library/bookedit/book_id:<?php echo $val['book_id'] ?>">
                            <button class="btn btn-primary" style="margin-left: 3px;">Edit</button>
                        </a>
                        
                    </div>
                    <hr>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>