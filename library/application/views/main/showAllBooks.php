<?php foreach ($books as $value): ?> 
<a href="book/book_id:<?php echo $value['book_id']; ?>">
	<h> 
		<?php echo $value['title'] . '.  ' . ' Автор:  ' . $value['author']; ?> 
	</h> 
</a>
<a href="/library/bookdelete/book_id:<?php echo $value['book_id']; ?>">
<button type="submit" name='delete' class="btn btn-danger">Del</button>
</a>
<?php echo '<br>' . '<hr>'; ?>
<?php endforeach; ?>



