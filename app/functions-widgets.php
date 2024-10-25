<?php

namespace Luthemes;
use Symfony\Component\HttpFoundation\Request;

function display_categories() { ?>
    <div id="categories" class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>
        <?php 
            $categories = \Novaris\Query::make( [
                'type'      => 'category',
                'number'    => PHP_INT_MAX,
                'order'     => 'desc',
                'orderby'   => 'date',
                'nocontent' => true,
            ] );
        ?>
        <ul>
            <?php foreach ( $categories as $entry ) { ?>
                <li>
                    <a href="<?= $entry->uri() ?>"><?= $entry->name(); ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php }

function display_archives() { ?>
    <div id="categories" class="widget widget_categories">
        <h3 class="widget-title">Archives</h3>
        <ul>
        <?php 
            $collection = \Novaris\Query::make([
                'type'      => 'post', // Ensure this is the correct content type for your archive
                'number'    => PHP_INT_MAX, // Fetch all posts for the archive
                'order'     => 'desc', // Descending order by date
                'orderby'   => 'date', // Sort by date
                'nocontent' => true // Avoid fetching full content to improve performance
            ]);

            $current_year = '';
            $current_month = '';

            if (!empty($collection)) {
                foreach ($collection as $entry) {
                    $timestamp = $entry->metaSingle('date');

                    // Convert non-numeric timestamps to Unix format
                    if (!is_numeric($timestamp)) {
                        $timestamp = strtotime($timestamp);
                    }

                    $year = date('Y', $timestamp);
                    $month = date('F', $timestamp); // Fetch the full month name
                    $month_number = date('m', $timestamp); // Numeric month for URL

                    // Only display the new month and year when it changes
                    if ($current_month !== $month || $current_year !== $year) {
                        $current_month = $month;
                        $current_year = $year;

                        // Manually construct the archive URL
                        $archive_url = '/archives/' . $year . '/' . $month_number . '/';

                        // Output the Month Year with a link
                        echo "<li><a href=\"{$archive_url}\">{$month} {$year}</a></li>";
                    }
                }
            } else {
                echo '<li>No archives available.</li>';
            }
        ?>
        </ul>
    </div>
<?php }

function display_themes( $entry ) { ?>
    <div id="themes" class="widget widget_themes">
        <?php if ( isset( $entry->cp_themes_api[0] ) && !empty( $entry->cp_themes_api[0] ) ): ?>
            <table>
                <tbody>
                    <tr>
                        <th>Theme Name:</th>
                        <td><?= $entry->cp_themes_api[0]['title']['rendered'] ?></td>
                    </tr>
                    <tr>
                        <th>Version:</th>
                        <td><?= $entry->cp_themes_api[0]['meta']['current_version'] ?></td>
                    </tr>
                    <tr>
                        <th>Updated:</th>
                        <td><?= date('F d, Y', $entry->cp_themes_api[0]['meta']['published_at']) ?></td>
                    </tr>
                    <tr>
                        <th>Requires PHP:</th>
                        <td><?= $entry->cp_themes_api[0]['meta']['requires_php'] ?></td>
                    </tr>
                    <tr>
                        <th>Repository:</th>
                        <td><a href="<?= e( 'https://github.com/luthemes/' . strtolower( $entry->cp_themes_api[0]['title']['rendered'] ) ); ?>">GitHub</a></td>
                    </tr>
                    <tr>
                        <th>Active Installs:</th>
                        <td><?= $entry->cp_themes_api[0]['meta']['active_installations'] ?></td>
                    </tr>
                </tbody>
            </table>
        <?php elseif (isset($entry->wp_themes_api) && !empty($entry->wp_themes_api ) ): ?>
        <table>
            <tbody>
                <tr>
                    <th>Theme Name:</th>
                    <td><?= $entry->wp_themes_api['name'] ?></td>
                </tr>
                <tr>
                    <th>Version:</th>
                    <td><?= $entry->wp_themes_api['version'] ?></td>
                </tr>
                <tr>
                    <th>Updated:</th>
                    <td><?= date('F d, Y', strtotime($entry->wp_themes_api['last_updated'])) ?></td>
                </tr>
                <tr>
                    <th>Requires PHP:</th>
                    <td><?= $entry->wp_themes_api['requires_php'] ?></td>
                </tr>
                <tr>
                    <th>Repository:</th>
                    <td><a href="<?= e( 'https://github.com/luthemes/' . $entry->wp_themes_api['slug'] ); ?>">GitHub</a></td>
                </tr>
            </tbody>
        </table>
        <?php else: ?>
        <p>No data available.</p>
        <?php endif; ?>
    </div>
<?php }

function display_themess() { 
// Get the current request path
$request = Request::createFromGlobals();
$currentPath = $request->getPathInfo();  // Get the current path of the request

// Extract the last segment of the path (the slug)
$currentSlug = basename($currentPath);
    ?>

    <div id="categories" class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>
        <?php 
            $categories = \Novaris\Query::make( [
                'type'      => 'themes',
                'number'    => PHP_INT_MAX,
                'order'     => 'desc',
                'orderby'   => 'date',
                'nocontent' => true,
                'names_exclude' => [
                    "{$currentSlug}"
                ]
            ] );

            
        ?>
        <ul>
            <?php foreach ( $categories as $entry ) { ?>
                <li>
                    <a href="<?= $entry->uri() ?>"><?= $entry->name(); ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php }