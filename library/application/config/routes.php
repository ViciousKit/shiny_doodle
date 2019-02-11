<?php

return [
	//MainController
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'authors' => [
		'controller' => 'main',
		'action' => 'showAllAuthors',
	],

	'books' => [
		'controller' => 'main',
		'action' => 'showAllBooks',
	],

	'book/book_id:\d+' => [
		'controller' => 'main',
		'action' => 'showBook',
		'id' => '',
	],

	'author/auth_id:\d+' => [
		'controller' => 'main',
		'action' => 'showAuthor',
		'id' => '',
	],

	'bookadd' => [
		'controller' => 'main',
		'action' => 'addBook',
	],

	'bookdelete/book_id:\d+' => [
		'controller' => 'main',
		'action' => 'deleteBook',
		'id' => '',
	],

	'bookedit/book_id:\d+' => [
		'controller' => 'main',
		'action' => 'editBook',
		'id' => '',
	],

];