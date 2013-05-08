<div class="wrapper">
	<!-- Header -->
	<header>
	    <div class="container">
		  <nav role="navigation">
			<?php if ($primary_nav): ?>
			  <?php print $primary_nav; ?>
			<?php endif; ?>
		  </nav>
	    </div>
	    <div class="header-inner">
		    <div class="container">
		    	<div class="toolbar">		    	
			      <?php if ($logo): ?>
			      <a class="brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
			        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			      </a>
			      <?php endif; ?>
			      <?php print render($page['header']); ?>		      
		        </div>
		    </div>
	    </div>
	</header><!--/header-->
	
	<!-- Content -->
	<section class="content content-login-section">
		<div class="container">
			  <?php print $messages; ?>				
			  <!-- page #title -->
			  <?php print render($title_prefix); ?>
			  <?php if ($title): ?>
			    <h1 class="page-header"><?php print $title; ?></h1>
			  <?php endif; ?>
			  <?php print render($title_suffix); ?>		  
			  
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
			  <!--<?php if ($breadcrumb): print $breadcrumb; endif;?>-->
			  <a id="main-content"></a>
			  <!-- page #title in -->
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
		
		</div><!--/.row-->
	 </div><!--/.container-->
	</section><!--/section-->
</div><!--/.wrapper-->

<!-- Footer -->
<footer class="footer">
	<div class="container">
		<div class="toolbar row">
    		<?php print render($page['footer']); ?>
		</div>
	</div>
</footer><!-- /footer -->
