<?php

/**
  command create table
 */
php artisan make:migration create_articles_table --create=articles
php artisan make:migration create_tags_table --create=tags
php artisan make:migration create_article_tag_table --create=article_tag
php artisan make:migration create_category_table --create=category
php artisan make:migration create_file_table --create=file
php artisan make:migration create_subjects_table --create=subjects
