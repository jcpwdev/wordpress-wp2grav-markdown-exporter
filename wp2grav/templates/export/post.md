---
# http://learn.getgrav.org/content/headers
title: <?php echo $title;?><?php echo "\n"; // for some strange reason the newline after the closing tag disappears ?>
slug: <?php echo $slug;?><?php echo "\n"; ?>
# menu: <?php echo $title;?><?php echo "\n"; ?>
date: <?php echo mysql2date('d-m-Y', $post->post_date);?><?php echo "\n"; ?>
published: <?php echo (get_post_status( $post->ID ) == 'publish')  ? 'true' : 'false'; echo "\n"; ?>
publish_date: <?php echo mysql2date('d-m-Y', $post->post_date);?><?php echo "\n"; ?>
# unpublish_date: <?php echo mysql2date('d-m-Y', $post->post_date);?><?php echo "\n"; ?>
# template: false
# theme: false
visible: true
summary:
    enabled: true
    format: short
    size: 128
taxonomy:
    migration-status: review
    category: [<?php echo strip_tags(get_the_category_list(',', '', $post->ID)); ?>]
    tag: [<?php
if (get_the_tags($post->ID)) {
    foreach (get_the_tags($post->ID) as $tag)
      {
          $t[] =  $tag->name;
      }
      echo implode(',', $t);
    }
?>]
author: <?php echo the_author_meta('user_nicename', $author_id); echo "\n"; ?>
metadata:
    author: <?php echo the_author_meta('user_nicename', $author_id); echo "\n"; ?>

---

<?php echo $content; ?>