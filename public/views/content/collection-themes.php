<li class="grid-item">
    <article id="" class="collection themes">
        <header class="entry-header">
            <figure class="post-thumbnail">
                <img src="<?= $entry->meta( 'thumbnail'); ?>" />
            </figure>
            <div class="caption">
                <h2 class="entry-title"><a href="<?= e( $entry->url() ); ?>"><?= e( $entry->title() ); ?></a></h2>
                <span><?= $entry->meta( 'type' ); ?></span>
            </div>
        </header>
    </article>
</li>