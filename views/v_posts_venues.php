<?php foreach($venues as $venue): ?>
    <!-- Print this venues's name -->
    <?=$venue['venue']?>
    <!-- If there exists a connection with this venue, show a unfollow link -->
    <?php if(isset($connections[$venue['venue']])): ?>
        <a href='/posts/unfollow_venue/<?=$venue['venue']?>'>Unfollow</a>
    <!-- Otherwise, show the follow link -->
    <?php else: ?>
        <a href='/posts/follow_venue/<?=$venue['venue']?>'>Follow</a>
    <?php endif; ?>
    <br><br>
<?php endforeach; ?>

