<?php

/**
 * 
 */
class Main extends Model
{
	//выводим на экран список авторов
	public function getAuthors() {
		$result = $this->database->row('SELECT * FROM authors ORDER BY author_surname');
		return $result;

	}

	//выводим на экран список книг с автором
	public function getBooks() {
		// $todelete = $this->database->row("DELETE FROM books WHERE author_id NOT IN (SELECT author_id FROM authors)");
		$result = $this->database->row('SELECT * FROM books ORDER BY title');
		return $this->addAuthorToArr($result);
	}

	public function addAuthorToArr($result) {
		for($i = 0; $i < count($result); $i++) {
			
			$id = $result[$i]['author_id'];
			$author = $this->database->row("SELECT author_surname, author_name FROM authors WHERE author_id = $id");
			
			$result[$i]['author'] = $author[0]['author_name'] . ' ' . $author[0]['author_surname'];
		}
		return $result;
	}

	//выводим все книги конкретного автора
	public function getAllAuthorsBooks($id) {
		$result = $this->database->row("SELECT * FROM books WHERE author_id = $id");
		return $result;
	}


	//количество книг автора и удалим пустых авторов
	public function count($result) {
		foreach ($result as $value) {
			$id = $value['author_id'];
			$count = count($this->database->row("SELECT * FROM books WHERE author_id = $id"));
			$this->database->query("UPDATE authors SET count = $count WHERE author_id = $id");
			if($count == 0) {
				$this->database->query("DELETE FROM authors WHERE count = 0");
			}
		}
		return $this->getAuthors();
	}

	//выводим конкретную книгу по id
	public function getSingleBook($id) {
		$result = $this->database->row("SELECT * FROM books WHERE book_id = $id");
		return $this->addAuthorToArr($result);
	}

	//добавляем книгу
	public function putBook($post) {
		$params = [
			'book_id' => null,
			'title' => $post['title'],
			'price' => $post['price'],
			'author_id' => $this->checkAuthorId($post['author_surname'], $post['author_name']),
			'genre' => $post['genre'],
		];

		$this->database->query('INSERT INTO books VALUES (:book_id, :title, :author_id, :price, :genre)', $params);
		$result = $this->database->row('SELECT * FROM books ORDER BY book_id DESC LIMIT 1'); //последняя добавленная книга
		return($result[0]['book_id']);
	}


	//проверяем  введенную фамилию автора на наличие в базе данных, если нет, то создаем нового автора
	public function checkAuthorId($postSurname, $postName) {
		$result = $this->database->row('SELECT author_surname, author_id FROM authors');
		$trueId = 1;
		foreach ($result as $value) {
			if($value['author_surname'] == $postSurname) {
				$trueId = $value['author_id']; //id существующего автора
			}
		}
		if($trueId == 1) {
			return $this->putAuthor($postSurname, $postName);
		}
		else{
			return $trueId;
		}
		
	}

	//если автора в базе нет, то добавляем нового и возвращаем его id
	public function putAuthor($postSurname, $postName) {
		$params = [
			'author_id' => null,
			'author_name' => $postName,
			'author_surname' => $postSurname,
			'count' => 1,
		];
		$result = $this->database->query('INSERT INTO authors VALUES(:author_id, :author_name, :author_surname, :count)', $params);
		return $this->database->lastInsertId(); //id добавленного нового автора
	}


	public function uploadBookImage($path, $type, $id) {
		$type = substr($type, 6);
		move_uploaded_file($path, 'materials/' . $id . ".$type");
	}


	public function changeBook($post, $id) {
		$params = [
			'book_id' => $id,
			'title' => $post['title'],
			'price' => $post['price'],
			'genre' => $post['genre'],
		];
		$this->database->query('UPDATE books SET title = :title, price = :price, genre = :genre WHERE book_id = :book_id', $params);
	}

	public function bookDelete($id) {
		$params = [
			'book_id' => $id,
			];
			$this->database->query('DELETE FROM books WHERE book_id = :book_id', $params);
	}
}