<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title ?></title>
    
    <LINK REL= "stylesheet" TYPE= "text/css" HREF= "/library/public/css/bootstrap.min.css" >
    <LINK REL= "stylesheet" TYPE= "text/css" HREF= "/library/public/css/template.css" >
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/library/public/js/bootstrap.min.js"></script>
    

    

 
  </head>

  <body style ="background-image: ;">

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          
          
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if($location == 'authors') echo 'class="active"'; ?> ><a href="/library/authors">Авторы</a></li>
            <li <?php if($location == 'books') echo 'class="active"'; ?> ><a href="/library/books">Книги</a></li>
            <!-- <li><a href="/library/admin/login">Авторизация</a></li> -->
            <li <?php if($location =='addbook') echo 'class="active"'; ?>><a href="/library/bookadd">Добавить книгу</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>



    <div class="container">



  


 

      <div class="starter-template" >
        <?php echo $content; ?>
      </div>


    </div>


    
  



</body>
  </html>