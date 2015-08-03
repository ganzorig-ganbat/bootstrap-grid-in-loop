# Twitter Bootstrap Grid Layout in Loop
Better way to display your content in bootstrap grid system with loop. You can use only one class and don't worry about how to split row and columns.

### Installation
Include php file somewhere in your code. Now you can use.
```php
include('bootstrap_grid.php');
```

### Usage
1. Set object of the class
```php
$post_grid = new bootstrap_grid();
```
2. Now set sum column and how many columns do you want to separete.
```php
// we are building 12 column layout.
$post_grid->set_sum_col(12);

// we need 3 columns in each row
$post_grid->set_col(3);
```

3. Here is our main loop
```php
echo '<div class="container">';
while ( have_posts() ) : the_post();
  echo $post_grid->open_layout();
  
  // here is what you want in column.
  echo 'Your content';
  
  echo $post_grid->close_layout();
endwhile;
// closing all tags
echo $post_layout->close_all();
echo '</div>';
```
