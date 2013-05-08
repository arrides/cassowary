<!--<div class="secondary-background-top54"></div>-->

<div class="wrapper">
<!-- Header -->
<header class="header-second">    
    <div class="header-inner">
	    <div class="container">
	    	<a class="secondary-logo" href="/" title="Home"><img src="<?php print base_path().path_to_theme()?>/img/cassowary-logo2.png" /></a>	    	
	        <?php print render($page['header']); ?>	    	
	    </div>
    </div>
</header><!--/header-->

<?php if ($page['top_messages']): ?>
<!--Top Messages -->
	<section class="top-messages">
		<div class="container">
	      <!--Page Content-->
		  <div class="row">
		  <?php print render($page['top_messages']); ?>
		  </div><!--/.row-->
	 </div><!--/.container-->
	</section><!--/section-->
<?php endif; ?>

<!--Top Content -->
	<section class="top-content">
		<div class="container">
	      <!--Page Content-->
		  <div class="row">
		  <?php print render($page['top_content']); ?>
		  </div><!--/.row-->
	 </div><!--/.container-->
	</section><!--/section-->
	
<section class="content portfolio">
	<div class="container">
	  	<!--Page Content-->
		<div class="row">
			  	
		    <?php if ($page['sidebar_first']): ?>
		      <aside class="span3" role="complementary">
		        <?php print render($page['sidebar_first']); ?>
		      </aside>  <!-- /#sidebar-first -->
		    <?php endif; ?>  
	  
			  <section class="<?php print _twitter_bootstrap_content_span($columns); ?>">  
		      <?php if ($page['highlighted']): ?>
		        <div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
		      <?php endif; ?>
		      
		      <a id="main-content"></a>
		      <?php print render($title_prefix); ?>
		      <?php if ($title): ?>
		        <h1 class="page-header"><?php print $title; ?></h1>
		      <?php endif; ?>
		      <?php print render($title_suffix); ?>
		      <?php print $messages; ?>
		      <?php if ($tabs): ?>
		        <?php print render($tabs); ?>
		      <?php endif; ?>
		      <?php if ($page['help']): ?> 
		        <div class="well"><?php print render($page['help']); ?></div>
		      <?php endif; ?>
		      <?php if ($action_links): ?>
		        <ul class="action-links"><?php print render($action_links); ?></ul>
		      <?php endif; ?>
		      <?php print render($page['content']); ?>
			  </section>
		
		    <?php if ($page['sidebar_second']): ?>
		      <aside class="span3" role="complementary">
		        <?php print render($page['sidebar_second']); ?>
		      </aside>  <!-- /#sidebar-second -->
		    <?php endif; ?>
		    
	    </div>  
  	</div>  
</section>
</div>

<!-- Footer -->
<footer class="footer">
	<div class="container">
		<div class="toolbar row">
    		<?php print render($page['footer']); ?>
		</div>
	</div>
</footer><!-- /footer -->
