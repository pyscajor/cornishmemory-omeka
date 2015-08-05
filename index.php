<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<div class="homepage-about">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content-block extra-padding">
                    <p style="font-size: 2em"><img src="/cm-images/cm-logo.png" alt="cornishmemory.com logo" style="width: 90px; float: left; margin-right: 20px" />Cornish life as captured on camera and recorded on reel.</p>

<p>Find photos, watch films, and listen to the stories of Cornwall's rich history from Victorian times to the present day. <strong><?php echo total_records('Item'); ?></strong> items and growing.</p>
<p><span class="fa fa-map"></span> <a href="/cornwall-map">Explore by Map</a> <span class="fa fa-list"></span> <a href="/items/browse">Browse Everything</a> <span class="fa fa-newspaper-o"></span> <a href="/collections/browse">See the Collections</a> <span class="fa fa-university"></span> <a href="/exhibits">View Exhibits</a> <span class="fa fa-search"></span> <a class="search-overlay-button">Search</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $featured = get_theme_option('Homepage: Featured Content'); ?>
<?php if ($featured && !empty($featured)): ?>
<div class="homepage-featured">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Explore -->
				<div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="content-block less-padding min-height">
							<a href="/cornwall-map" class="featured">
								<h6 class="header-label">Explore the map</h6>
									<div class="overlay"></div>
									<div style="background-image: url(/cm-images/cm-frontpage-map.jpg);" class="img"></div>
									<span class="title">Thousands of mapped items</span>
							</a>
                        </div>
                    </div>
					<div class="col-sm-6 col-md-4">
                        <div class="content-block less-padding min-height">
							<div class="featured">
								<h6 class="header-label">Search</h6>
									<div class="overlay"></div>
									<div style="background-image: url(/cm-images/por016_access.jpg);" class="img"></div>
									<span class="maptitle"><form id="search-form" name="search-form" action="/search" method="get"><input type="text" name="query" id="query" value="" class="form-control" placeholder="Type here then press enter"></form></span>
							</div>
                        </div>
                    </div>
                    <div class="hidden-sm col-md-4">
                        <div class="content-block less-padding min-height">
						<a href="/items/browse" class="featured">
							<h6 class="header-label">Browse</h6>
								<div class="overlay"></div>
								<div style="background-image: url(/cm-images/por024_access.jpg);" class="img"></div>
								<span class="title">Browse Everything</span>
						</a>
                        </div>
                    </div>
                    
                </div>
				<!-- End Explore -->
				<div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="content-block less-padding min-height">
                            <?php echo sckls_random_featured_item(); ?>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="content-block less-padding min-height">
                            <?php echo sckls_random_featured_collection(); ?>
                        </div>
                    </div>
                    <div class="hidden-sm col-md-4">
                        <div class="content-block less-padding min-height">
                        <?php if (plugin_is_active('ExhibitBuilder')): ?>
                            <?php echo sckls_exhibit_builder_display_random_featured_exhibit(); ?>
                        <?php else : ?>
                            <h4 class="not-featured">No featured exhibits.</h4>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="homepage-recent">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content-block">
                    <h5 class="header-label">Recently Added Items</h6>
					
					<?php 
					                        $homepageRecentItems = '6';
					                        set_loop_records('items', get_recent_items($homepageRecentItems));
					                        if (has_loop_records('items')):
					                    ?>
					                        <div class="items-list slider">
					                        <?php foreach (loop('items') as $item): ?>
					                            <?php $image = $item->Files;?>
					                            <?php if ($image): ?>
					                            <div class="item">
												<?php
													
												echo '  <a href="' . record_url($item, null, true) . '">';
												echo '    <div class="overlay"></div>';
														if (metadata('item', 'has thumbnail')):
													echo '<div style="background-image: url(' . file_display_url($image[0], 'fullsize') . ');" class="img"></div>';
													else:
													echo '<div style="background-image: url(/themes/cornishmemory/images/fallback-video.png);" class="img"></div>';
														endif;					                          
												echo '    <span class="title">' . metadata('item', array('Dublin Core', 'Title')) . '</span>';
												echo '  </a>';
												?>
					                            </div>
					                            <?php endif; ?>
												
					                        <?php endforeach; ?>
					                        </div>
					
                    <?php else: ?>
                        <p><?php echo 'No recent items available.'; ?></p>
                    <?php endif; ?>
					
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo foot(); ?>
