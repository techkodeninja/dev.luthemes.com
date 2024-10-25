<section id="content" class="site-content">
	<div id="layout" class="no-sidebar">
		<main id="main" class="content-area">
			<article class="post">
				<header class="entry-header">
				<h1 class="entry__title"><?= e( $entry->title() ) ?></h1>
				</header>
				<div class="entry-content">
					<?= $entry->content() ?>
				</div>
			</article>
		</main>
	</div>
</section>