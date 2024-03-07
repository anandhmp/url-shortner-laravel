<h1><?php echo $header; ?></h1>

<?php foreach($listing as $lists): ?>
<h2><?php echo $lists['title']; ?></h2>
<p><?php echo $lists['description']; ?></p>
<?php endforeach; ?> 