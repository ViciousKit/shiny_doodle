<div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
               
                    <div class="post-preview">
                       

                        <h><?php echo 'Название книги: ' . $book_data[0]['title'] . '<br>';  ?></h>
                      <h><?php echo 'Автор: ' . $book_data[0]['author']. '<br>'; ?></h>
                      <h><?php echo 'Жанр: ' . $book_data[0]['genre']. '<br>'; ?></h>
                      <h><?php echo 'Цена: ' . $book_data[0]['price']. '<br>'; ?></h>
                        
                    <?php if(file_exists('materials/' . $book_data[0]['book_id'] . '.jpeg')): ?>
                    
                        <img src="/library/materials/<?php echo $book_data[0]['book_id']?>.jpeg" width="170" height="280">

                    <?php endif; ?>
                    
                    
                    </div>


                    <hr>
                <!-- <form action="/library/bookdelete/ <?php echo $book_data[0]['book_id'] ?>" method="post">
                    <button type="submit" name='delete' class="btn btn-danger">Del</button>
                </form> -->

                <a href="/library/bookdelete/book_id:<?php echo $book_data[0]['book_id'] ?>">
                <button type="submit" name='delete' class="btn btn-danger">Del</button>
                </a>

                

                <a href="/library/bookedit/book_id:<?php echo $book_data[0]['book_id'] ?>">

                        <button type="submit" name='edit' class="btn btn-primary">Edit</button>
                </a>


               
                
            
        </div>
    </div>