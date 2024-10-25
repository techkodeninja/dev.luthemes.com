<?php
use Novaris\Query;
use Symfony\Component\HttpFoundation\Request;

function body_class( $classes = '' ) {
    // Add the result of is_home() (returns 'home' or 'blog')
    $classes .= ' ' . is_home();

    // Add the result of is_single() (returns 'single' if true, 'post' if false)
    $classes .= ' ' . (is_single() ? 'single' : 'page');

    // Output the final class attribute
    echo trim($classes);
}

function is_home() {
    $classes = '';
    $test = config( 'app.home_alias' );

    if ( $test === 'post' ) {
        $classes = 'blog';
    } else {
        $classes = 'home';
    }

    return $classes;
}

function is_single() {
    // Get the current request path
    $request = Request::createFromGlobals();
    $currentPath = $request->getPathInfo();  // Get the current path of the request
    // Check if the current path starts with /archives
    if (strpos($currentPath, '/archives') === 0) {
        return true;  // The current page is under /archives
    }

    // Query all posts without content
    $posts = Query::make([
        'type' => 'post',
        'nocontent' => true,
    ]);

    // Iterate through the posts and compare the URIs
    foreach ($posts as $post) {
        // Get the path portion of the post's URI
        $postPath = parse_url($post->uri(), PHP_URL_PATH);

        // Check if the current path matches the post's path
        if ($currentPath === $postPath) {
            return true;  // The current page is a single content entry
        }
    }

    return false;  // The current page is not a single content entry
}
