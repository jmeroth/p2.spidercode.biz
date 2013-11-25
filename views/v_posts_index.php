<?php foreach($posts as $post): ?>

<article>
<form method='POST' action='/posts/p_index/<?=$post['post_id']?>'>

    <h1><?=$post['venue']?></h1>
	<p><?=$post['first_name']?> <?=$post['last_name']?> posted:</p>

	<textarea name='content' id='content'><?=$post['content']?></textarea>

<!--Dates-->
	<br/>
    <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
        created <?=Time::display($post['created'])?>
    </time>

    <time datetime="<?=Time::display($post['modified'],'Y-m-d G:i')?>">
        , last modified <?=Time::display($post['modified'])?>
    </time>

	<input type='submit' value='save changes'>

</form>
</article>

<?php endforeach; ?>

