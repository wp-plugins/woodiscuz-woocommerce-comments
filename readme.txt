=== WooDiscuz - WooCommerce Comments ===

Contributors: gVectors Team

Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JD86QPWM6QUXW

Tags: WooCommerce, WooCommerce Comments, WooCommerce Reviews, WooCommerce Product Discussions, comments, reviews, discussions, product, shop, ecommerce, comments tab, discussion tab, question and answer, product question, product support

Requires at least: 3.0

Tested up to: 4.0

Stable tag: 1.0.4

License: GPLv2 or later

License URI: http://www.gnu.org/licenses/gpl-2.0.html

WooCommerce comments and discussion Tab. Allows your customers discuss about your products, vote for comments and share. 

== Description ==

WooCommerce product comments and discussion Tab. Allows your customers to discuss about your products and ask pre-sale questions. Adds a new "Discussions" Tab next to "Reviews" Tab. Your shop visitors will thank you for ability to discuss about your products directly on your website product page. WooDiscuz also allows to vote for comments and share products.

**WooDiscuz helps you increase your sales!**

- *It gives life to your online store ;)*
- *Keeps customers closer to your shop*
- *Lets them discuss about your products*
- *Allows to ask pre-sale questions before buying the product*
- *Lets your shop visitors see all customers' activity*
- *Allows you to provide an excellent customer support on product page*
- *As a result you have a ready and product specific FAQ under each Product separately*


[youtube https://www.youtube.com/watch?v=umtFm20haRA /]


**WooDiscuz Features:**

* | **Front-end**
* | Adds a new "Discussions" Tab on product page
* | Responsive discussion form and comment threads design
* | Interactive, clean, simple and easy user interface and user experience
* | Fast and easy comment form with ajax validation and data submitting 
* | Allows to create a new discussion thread and reply to existing comment
* | Ajax button "Load More Comments" instead of simple comments pagination
* | Fully integrated and compatible with Wordpress and WooCommerce 
* | Uses Wordpress Comment system with all managing functions and features
* | Flexible options for Guests, Customers and Administrators permissions
* | Adds labels/titles for each discussion member ( Guest, Customer, Support )
* | Uses WP Avatar System, fully compatible with BuddyPress and other profiling plugins
* | Secure and Anti-Spam features will not allow spammers to comment
* | Comment voting with positive and negative result
* | Smart voting system with tracking by logged-in user and cookies
* | Product sharing options: Facebook, Twitter and Google+
* 
* | **Dashboard** 
* | Option to set Discussion Tab as the first opened Tab on product page 
* | Option to hide/remove WooCommerce Product Review Tab
* | Options to turn On/Off Comment Voting and Product Sharing features
* | Option to hide/show CAPTCHA field on comment form
* | Option for "User Must be registered to comment"
* | Option to held new comments for moderation 
* | Option to hide "Reply" button for Guests, allowing only to create a new threads
* | Option to hide "Reply" button for Customers, allowing only to create a new threads
* | Option to hide user labels/titles
* | Option to set usergroups for "Support" user label/title 
* | Option to set number of comment threads per page (for "load more comments" button) 
* | Option to notify administrators and comment authors on new comment/reply
* | Option to manage font color and comment/reply background colors
* | Front-end phrase managing options, you'll be able to translate or change all phrases



If your Wordpress is not 4.x please read the note below.

**IMPORTANT NOTE:** This plugin is designed for Wordpress 4.0 and higher versions. If your Wordpress version is less than 4.0, you should do a small change in `wp-includes/comment-template.php` file.

Please open it and find this:

`$r = wp_parse_args( $args, $defaults );`

Add this row after:

`$r = apply_filters( 'wp_list_comments_args', $r );`

There will not be any additional changes on Wordpress update. If you update your Wordpress to 4.x this script will be added automatically.


== Installation ==

1. Upload plugin folder to the '/wp-content/plugins/' directory,
2. Activate the plugin through the 'Plugins' menu in WordPress.

If your Wordpress is not 4.x please read the note below.

**IMPORTANT NOTE:** This plugin is designed for Wordpress 4.0 and higher versions. If your Wordpress version is less than 4.0, you should do a small change in `wp-includes/comment-template.php` file.

Please open it and find this:

`$r = wp_parse_args( $args, $defaults );`

Add this row after:

`$r = apply_filters( 'wp_list_comments_args', $r );`

There will not be any additional changes on Wordpress update. If you update your Wordpress to 4.x this script will be added automatically.

== Frequently Asked Questions ==

= Please Check the Following WooDiscuz Resources =

* Support Forum: <http://gvectors.com/questions/>
* Plugin Page: http://www.gvectors.com/woodiscuz-woocommerce-comments-and-product-discussions/
* WooDiscuz Global Community: http://woodiscuz.com/
* Blog: http://profprojects.com/category/blog/woocommerce/

== Screenshots ==

1. Ajax Form to add a new discussion thread Screenshot #1
2. Discussion Threads with Reply Form Screenshot #2
3. Full Front-End View Screenshot #3
4. WooDiscuz General Settings #4
5. WooDiscuz Comment Management Page Screenshot #5
6. WooDiscuz Front-end Phrase Manager #6
7. Another Full Front-End View Screenshot #7

== Changelog ==

= 1.0.4 =
Fixed Bug : Maximum execution time error on inserting a new comment.
Fixed Bug : Encoding issue with non-latin characters

= 1.0.3 =
Fixed Bug : Gravatars issue in product reviews
Fixed Bug : WooDiscuz comments' time zones synchronization with Wordpress
Fixed Bug : Header text changing issue

= 1.0.2 =
Fixed Bug : CAPTCHA reloading issue with wp-content redirecting plugins.

= 1.0.1 =
Fixed Bug : All comment replies from Dashboard > Comments went to Product Review. Now it's being filtered and added in right place.

= 1.0.0 =
Initial version