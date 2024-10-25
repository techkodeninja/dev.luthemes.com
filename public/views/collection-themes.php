<?= $engine->include( 'header.default' ) ?>
<section id="content" class="site-content">
    <main id="main" class="content-area">
        <ul class="grid-items grid-col-3">
            <?= $engine->each( 'content.collection-themes', $collection, 'entry' ) ?>
        </ul>
        <?php $engine->includeWhen( $pagination, 'nav.pagination.primary' ) ?>
    </main>
</section>
<?= $engine->include( 'footer.default' ) ?>