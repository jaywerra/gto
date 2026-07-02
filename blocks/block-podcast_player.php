<?php
    $title = get_sub_field("title");
    $wysiwyg = get_sub_field("wysiwyg");
    $link = get_sub_field("link");
?>

<div class="podcast">
    <div class="container">
        <div class="podcast-header">
            <?php if ($title): ?>
                <h2 class="podcast-heading centered-text">
                    <?php echo $title; ?>
                </h2>
            <?php endif; ?>
            <?php if ($wysiwyg): ?>
                <div class="podcast-wysiwyg">
                    <?php echo $wysiwyg; ?>
                </div>
            <?php endif; ?>
            <div class="podcast-player">
                <iframe src="https://open.spotify.com/embed-podcast/show/3sZ0c8bOJ5YzM1jAbdXE6l" width="100%" height="232" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
            </div>
            <?php if ($link): ?>
                <a href="<?php echo $link; ?>" target="_blank" class="button button--green button--lg">
                    Listen to more episodes
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>