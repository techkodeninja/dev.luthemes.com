<?php $engine->include( 'header.default' ) ?>
<section id="content" class="site-content">
    <main id="main" class="content-area">
        <header class="entry__header o-flow o-container-base">
            <h1 class="entry__title"><?= batch( $single->title(), 'e|runt' ) ?></h1>
        </header>
        <div class="entry-content">
            <?= $single->content(); ?>
        </div>
        <ul class="grid-items grid-col-3">
            <?= $engine->each( 'content.archive', $collection, 'entry' ) ?>
        </ul>
    </main>
</section>
<?php $engine->include( 'footer.default' ) ?>