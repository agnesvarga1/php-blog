 

 <div class="mx-auto px-4 bg-body-tertiary">
 <nav class="navbar  w-75 mx-auto">
 
 <a href="http://localhost:8888/php-blog/public/" class="navbar-brand fs-1">Blog</a>
 
 <?php if (isset($_SESSION['user_id'])): ?>
  <a href="http://localhost:8888/php-blog/public/logout"> <button class="btn btn-danger m-2" >Logout</button></a>
  <?php else: ?>
  <a href="http://localhost:8888/php-blog/public/login"> <button class="btn btn-primary m-2" >Login</button></a>
 
  <?php endif; ?>
</nav>
 </div>

   