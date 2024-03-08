<h1>
    <!-- the $heading is still coming from view router -->
    <?= $heading; ?>
</h1>
<!-- To show each listings that is coming from the view manually -->
<?php foreach ($listings as $listing) : ?>
    <h2> <?= $listing['title'] ?> </h2>
    <p> <?= $listing['description'] ?> </p>

<?php endforeach; ?>