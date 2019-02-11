<?php

/**
 * 
 */
class MainController extends Controller

{

	public function index() {

		$vars = [
			'location' => 'default'
		];
		$this->view->render('Главная', $vars);

	}
	

	public function showAllAuthors() {
		$result = $this->model->getAuthors();
		$result_with_count = $this->model->count($result);

		$vars = [
			'location' => 'authors',
			'authors' => $result_with_count,
		];
		$this->view->render('Авторы', $vars);

	}

	public function showAllBooks() {
		$result = $this->model->getBooks();
		$vars = [
			'location' => 'books',
			'books' => $result,
		];
		$this->view->render('Книги', $vars);
	}

	public function showBook() {
		$result = $this->model->getSingleBook($this->controllerAndAction['id']);
		$vars = [
			'location' => 'books',
			'book_data' => $result,
		];
		$this->book_arr = $result;

		$this->view->render('О книге', $vars);
	}

	public function showAuthor() {
		$result = $this->model->getAllAuthorsBooks($this->controllerAndAction['id']);
		$vars = [
			'location' => 'authors',
			'books' => $result,
		];
		$this->view->render('Библиография', $vars);

	}

	public function addBook() {
		$vars = [
			'location' => 'addbook'
		];
		if(!empty($_POST)) {
			$id = $this->model->putBook($_POST);
			$this->model->uploadBookImage($_FILES['img']['tmp_name'], $_FILES['img']['type'], $id);
			$this->view->redirect('/library/books');
		}
		$this->view->render('Добавить в библиотеку', $vars);
	}

	public function editBook() {
		$id = $this->controllerAndAction['id'];
		$result = $this->model->getSingleBook($id);
		$vars = [
			'location' => 'books',
			'book_data' => $result,
		];
		if(!empty($_POST)) {

			$this->model->changeBook($_POST, $id);
			$this->model->uploadBookImage($_FILES['img']['tmp_name'], $_FILES['img']['type'], $id);
			$this->view->redirect('/library/book/book_id:' . $id);
		}
		$this->view->render('Редактирование', $vars);
	}

	public function deleteBook() {
		$id = $this->controllerAndAction['id'];
		$this->model->bookDelete($id);
		$this->view->redirect('/library/books');

	}







	
}