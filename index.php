<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>

<div class="homepage-about">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content-block extra-padding">
					<h5 class="header-label">Dynnargh / Welcome</h6>
                    <p style="font-size: 2em"><img src="/cm-images/cm-logo.png" alt="cornishmemory.com logo" style="width: 90px; float: left; margin-right: 20px" />Cornish life as captured on camera and recorded on reel.</p>

<p>Find photos, watch films, and listen to the stories of Cornwall's rich history from Victorian times to the present day. <strong><?php echo total_records('Item'); ?></strong> items and growing.</p>
<p><form id="search-form" name="search-form" action="/search" method="get"><input type="text" name="query" id="query" value="" class="form-control" placeholder="Search cornishmemory.com - type here then press enter"></form></p>
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
