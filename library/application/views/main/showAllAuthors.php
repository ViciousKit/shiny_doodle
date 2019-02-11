<div class="row">
<?php foreach ($authors as $value): ?> 
<a href="author/auth_id:<?php echo $value['author_id']; ?>">
	<h> <?php echo $value['author_name'] . ' ' . $value['author_surname'];
	 if($value['count'] > 0) {echo ' (Количество книг: '. $value['count'] . ')';} 
	 echo '<br>';
	 ?> 
	</h> 
</a>
<?php endforeach; ?>
</div>
