<?= $engine->include( 'header.default' ) ?>
<section id="content" class="site-content">
    <div id="layout" class="right-sidebar">
        <main id="main" class="content-area">
            <?= $engine->each( 'content.collection', $collection, 'entry' ) ?>
        </main>
        <aside id="secondary" class="widget-area">
            <?php Luthemes\display_categories(); ?>
            <?php Luthemes\display_archives(); ?>
        </aside>
    </div>
</section>
<?= $engine->include( 'footer.default' ) ?>