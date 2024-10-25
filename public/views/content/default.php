<section id="introduction" class="site-introduction" style=" background: url( <?= $single->meta( 'image' ); ?> ); background-position: center; padding: 50px;">
    <main id="main" class="content-area">
        <article id="" class="post">
        <header class="entry-header">
            <h1 class="entry-title"><?= e( $single->title() ); ?></h1>
        </header>
        <section class="entry-content">
            <?= $single->content() ?>
        </section>
        </article>
    </main>
</section>
<section id="themes" class="site-themes">
    <main id="main" class="content-area">
        <article id="" class="post">
            <header class="entry-header">
                <h1 class="entry-title">Themes</h1>
            </header>
            <section class="entry-content">
                <?php 
                    $collections = Novaris\Query::make( [
                        'type'      => 'themes',
                        'number'    => 9,
                        'order'     => 'desc',
                        'orderby'   => 'date',
                        'nocontent' => true
                    ] );
                    echo "<ul class='grid-items'>";
                        foreach ( $collections as $entry ) {
                            echo "<li class='grid-item'>";
                                echo "<img src='" . $entry->meta('thumbnail') . "' />";
                                echo "<div class='caption'>";
                                    echo "<h2 class='entry-title'><a href='" . $entry->uri() . "'>" . $entry->title() . "</a></h2>";
                                    echo "<span>" . $entry->meta( 'type') . "</span>";
                                echo "</div>";
                            echo "</li>";
                        }
                    echo "</ul>";
                ?>
            </section>
        </article>
    </main>
</section>