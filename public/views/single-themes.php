<?php $engine->include( 'header/default' ); ?>
<section id="content" class="site-content">
    <div id="layout" class="right-sidebar">
        <main id="main" class="content-area">
            <?= $engine->include( 'content.themes' ); ?>
        </main>
        <aside id="secondary" class="widget-area">
            <div id="thumbnail" class="widget widget_thumbnail">
                <figure>
                    <img src="<?= $entry->meta( 'thumbnail' ); ?>" />
                </figure>
            </div>
            <?php Luthemes\display_themes( $entry ); ?>
        </aside>
    </div>
</section>
<section id="related" class="related-themes">
    <div class="content-area">
        <?php
            $request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
            $currentPath = $request->getPathInfo();  // Get the current path of the request

            // Extract the last segment of the path (the slug)
            $name = basename($currentPath);

            $collections = \Novaris\Query::make( [
                'type' => 'themes',
                'number'    => 3,
                'order' => 'random',
                'nocontent' => true,
                'names_exclude' => [
                    "{$name}"
                ]
            ] ); ?>

            <ul class="grid-items">
                <?php
                    foreach( $collections as $entry ) { ?>
                        <li class="grid-item">
                            <figure class="post-thumbnail">
                                <img src="<?= $entry->meta( 'thumbnail'); ?>" />
                            </figure>
                            <div class="caption">
                                <h2 class="entry-title"><a href="<?= e( $entry->url() ); ?>"><?= e( $entry->title() ); ?></a></h2>
                                <span><?= $entry->meta( 'type' ); ?></span>
                            </div>
                        </li>
                <?php } ?>
            </ul>
    </div>
</section>
<?php $engine->include( 'footer/default' ); ?>