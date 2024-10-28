 

 <div class="mx-auto px-4 bg-body-tertiary">
 <nav class="navbar  w-75 mx-auto">
 
 <a href="http://localhost:8888/php-blog/public/" class="navbar-brand fs-1">Blog</a>
 
 <?php if (isset($_SESSION['user_id'])): ?>
  <a  class="btn btn-danger m-2" href="http://localhost:8888/php-blog/public/logout"> Logout</a>
  <?php else: ?>
  <a class="btn btn-primary m-2" href="http://localhost:8888/php-blog/public/login"> Login</a>
 
  <?php endif; ?>
</nav>
 </div>

   