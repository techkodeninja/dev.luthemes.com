---
title: "White Spektrum"
date: 2014-05-29 12:00:00 -8
thumbnail: "/user/media/themes/white-spektrum.png"
type: "WordPress Theme"
---
<b>White Spektrum</b> is a parent theme for bloggers that use multiple nav menus, several sidebars, and custom post layouts. It has a pixel-perfect design that's great for any blogger who wants a enw look for their site.

<b>White Spektrum</b> is a a parent theme. What this means is that to customize it, you should be creating a child theme. All you need to know that it is a solid, yet flexible starting point for any blog.

<h2>Features</h2>

<b>White Spektrum</b> is built from the rock-solid <a href="http://github.com/backdrop-dev/framework" title="Backdrop framework">Backdrop Framework</a> theme framework, so it provides a great starting point with many useful features.</p>

<ul>
	<li>Per-post layouts that allow you to quickly change the layout of your site.</li>
	<li>Post thumbnails that work with WordPress' featured image functionality and provide extra features.</li>
	<li>Multiple sidebars that you can customize however you like.</li>
	<li>Ability to create custom templates for any post type in multiple ways.</li>
	<li>And much, much more!</li>
</ul>

<h2>Child themes</h2>

<p>Since <b>White Spektrum</b> is a parent theme, you'll want to create a child theme if you plan on making any customizations.  <em>Don't know how to make a child theme?</em>  It's relatively simple.  Just follow the below steps.</p>

<ul>
	<li>Create a theme folder in your <code>/wp-content/themes</code> directory called <code>White Spektrum-child</code>.</li>
	<li>Then, create a <code>style.css</code> file within your theme folder.</li>
	<li>At the top of your <code>style.css</code> file, add the below information.</li>
</ul>

<pre><code>/**
 * Theme Name: White Spektrum Child
 * Theme URI: http://link-to-your-site.com
 * Description: Describe what your theme should be like.
 * Version: 0.1
 * Author: Your Name
 * Author URI: http://link-to-your-site.com
 * Tags: Add, Whatever, Tags, You, Want
 * Template: white-spektrum
 */</code></pre>

This will give you a blank design.  If you want to import the <em>White Spektrum</em> parent theme style, simply append this code after the above information:

<pre><code>@import url( '../white-spektrum/style.css' );

/* Custom code goes below here. */</code></pre>