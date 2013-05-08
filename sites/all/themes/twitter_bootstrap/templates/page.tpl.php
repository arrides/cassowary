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
	<!--Top Content -->
	<section class="top-content">
		<div class="container">
			  <?php print $messages; ?>		
	      <!--Page Content-->
		  <div class="row">
		  <?php print render($page['top_content']); ?>
		  </div><!--/.row-->
	 </div><!--/.container-->
	</section><!--/section-->
	
	<!-- Content -->
	<section class="content">
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
			  <!--<?php if ($breadcrumb): print $breadcrumb; endif;?>-->
			  <a id="main-content"></a>
			  <?php print render($title_prefix); ?>
			  <?php if ($title): ?>
			    <h1 class="page-header"><?php print $title; ?></h1>
			  <?php endif; ?>
			  <?php print render($title_suffix); ?>
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

    <?php if ($page['pre_footer']): ?>
        <div class="pre-footer">
            <?php print render($page['pre_footer']); ?>
        </div>
    <?php endif; ?>
	</section><!--/section-->
</div><!--/.wrapper-->


<!-- Footer -->
<footer class="footer">
	<div class="container">
		<div class="toolbar row">
    		<?php print render($page['footer']); ?>
		</div>
		<!--
		<div class="copy">
            <img src="<?php print base_path().path_to_theme()?>/img/cassowary-logo-gray.png" />            
            <p>© 2012 Cassowary Creative</p>
        </div>
        -->
	</div>
</footer><!-- /footer -->
