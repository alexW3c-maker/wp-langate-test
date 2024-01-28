
<footer class="bg-light text-center text-lg-start"> 
  <div class="container p-4"> 
    <h5 class="text-uppercase">About</h5> 
    <p>
    This is the footer, this is where you can place the necessary menus and information..
    </p> 
     
  </div> 
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © <?php echo date("Y"); ?> 
    <a class="text-dark" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
    . All rights reserved.
  </div> 
</footer> 
<?php wp_footer(); ?>
</body>
</html>