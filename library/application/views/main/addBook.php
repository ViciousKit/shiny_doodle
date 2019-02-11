<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4" style ='margin-left: 30%;'>
                        <form action="/library/bookadd" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Название книги</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label>Имя и отчество автора книги</label>
                                <input class="form-control" type="text" name="author_name">
                            </div>
                            <div class="form-group">
                                <label>Фамилия автора книги</label>
                                <input class="form-control" type="text" name="author_surname">
                            </div>
                            <div class="form-group">
                                <label>Жанр</label>
                                <input class="form-control" type='text'  name="genre">
                            </div>
                            <div class="form-group">
                                <label>Цена</label>
                                <input class="form-control" type='number'  name="price">
                            </div>
                           <!-- <div class="form-group">
                                <label>Загрузить книгу</label>
                                <input class="form-control" type="file" name="book">
                            </div> -->
                            <div class="form-group">
                                <label>Загрузить изображение обложки</label>
                                <input class="form-control" type="file" name="img">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>