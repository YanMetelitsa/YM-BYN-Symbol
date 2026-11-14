=== YM BYN Symbol ===
Contributors: yanmetelitsa
Tags: byn, symbol, currency, woocommerce
Stable tag: 1.2.0
Requires PHP: 7.0
Requires at least: 4.6
Tested up to: 7.1
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Automatically adds the new Belarusian ruble currency symbol to your site, with full WooCommerce support and an option for manual use.

== Description ==

In early 2026, the National Bank of the Republic of Belarus approved a new currency symbol for the Belarusian ruble. This plugin lets you display it on your WooCommerce store (and beyond) in just a few clicks.

This plugin requires no special skills or customizations and has absolutely no impact on your site's performance.

=== Advantages ===

- Lightweight, Simple, and Flexible
- Uses **Official Assets**
- Optimized for **Search Engines**
- Optimized for **Multi-Currency** Websites
- Compatible With or Without **WooCommerce**
- No Ads or Promos

=== WooCommerce Use ===

Using WooCommerce? Simply pick **"Belarusian Ruble"** in your currency settings, activate **YM BYN Symbol**, and you're all set – the new symbol appears automatically across the entire site.

=== Manual Use ===

You can also use the symbol manually – add the `ym-byn-symbol` class to any element contains "BYN" string. For example:

`<span>10 <span class="ym-byn-symbol">BYN</span></span>`

In the admin area, just use the "ƃ" symbol anywhere, nothing else is required:

`
<span>10 ƃ</span>
`

=== Support ===

If you encounter any difficulties implementing the currency symbol on your site, please use [the plugin's support forum](https://wordpress.org/support/plugin/ym-byn-symbol/) — I'll be happy to help.

== Frequently Asked Questions ==

= Which symbol style does the plugin use? =

The plugin uses two display methods: a three-character form (BYN) on the frontend and a single-character form (ƃ) in the admin area. The three-character form offers better SEO, is easier for users to copy, and is recommended by the National Bank of the Republic of Belarus. The single-character form is used in the admin area because it is more convenient there, and SEO is not a concern in that context.

= What if I want to use the single-character form on the frontend? =

If you use WooCommerce, simply add the following code to your theme:

`add_filter( 'ym_byn_symbol_wc_use_frontend_b', '__return_true' );`

The "ƃ" symbol will then be used across your entire site.

For manual use, replace the `ym-byn-symbol` class with `ym-byn-symbol-b` and use the "ƃ" symbol accordingly:

`<span>10 <span class="ym-byn-symbol-b">ƃ</span></span>`

= What should I do if the currency symbol's height differs from the rest of the text? =

This is the main drawback of the three-character method. With this method, the plugin applies `font-size: 125%` to the symbol, which works well with most fonts. However, if the symbol appears smaller or larger than the surrounding text with your font, simply adjust the values for your site:

`
.ym-byn-symbol,
body.wc-byn-currency .woocommerce-Price-currencySymbol {
	font-size: 120%;
}
`

If you are still not satisfied with the result, you can also switch to the single-character method, which does not have this issue. However, this method is not recommended due to its negative impact on SEO.

= How to use symbol in dynamic elements? =

On the frontend, for elements containing more than just the "BYN" string (e.g. `<select>`), use the "ƃ" symbol instead of "BYN", than manually set the "nbrb-b" currency font family via CSS and include your site font (the `--your-site-font-family` variable is used in the example):

`
<select style="font-family: 'nbrb-b', var( --your-site-font-family )">
	<option>ƃ – BYN</option>
	<option>₽ – RUB</option>
</select>
`

== Screenshots ==

1. WooCommerce currency selection
2. WooCommerce status dashboard widget
3. Product cards
4. Single product page
5. Product cards with different price types
6. WooCommerce analytics

== Changelog ==

= 1.2.0 =

*Added*

* The option to use a single-character method in the frontend (see the plugin description)

*Fixed*

* Height of the currency symbol

= 1.0.1 =

*Added*

* Support for multi-currency websites

= 1.0.0 =

* Initial release