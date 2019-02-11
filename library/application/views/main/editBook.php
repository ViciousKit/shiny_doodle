<div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
             <div class="post-preview">
                <form action="/library/bookedit/book_id:<?php echo $book_data[0]['book_id'] ?>" method="post" enctype="multipart/form-data">
                    <label>Название книги</label>
                    <p><input type="text" name="title" value=" <?php echo $book_data[0]['title']?>"></p>
                    <label>Жанр</label>
                     <p><input type="text" name="genre" value=" <?php echo $book_data[0]['genre']?>"></p>
                    <label>Цена</label>
                     <p><input type="text" name="price" value=" <?php echo $book_data[0]['price']?>"></p>

                      <h><?php echo 'Автор: ' . $book_data[0]['author']. '<br>'; ?></h>
                    <label>Обложка книги</label>
                    <p><input class="form-control" type="file" name="img"> </p>
                   
                        
                    <?php if(file_exists('materials/' . $book_data[0]['book_id'] . '.jpeg')): ?>
                    
                        <img src="/library/materials/<?php echo $book_data[0]['book_id']?>.jpeg" width="170" height="280">

                    <?php endif; ?>
                    
                    
                    </div>


                    <hr>
                

                
                
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                
            
        </div>
    </div>