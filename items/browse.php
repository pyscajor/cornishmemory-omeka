<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<div class="container">
    <div class="content-block">
	       
	            
				
        <h1><?php echo 'Browse items'; ?></h1>
		
<p>You may wish to use a <a class="search-overlay-button"><span class="glyphicon glyphicon-search"></span> Search</a> or visit our <a href="/cornwall-map">map</a> and explore our <a href="/collections/browse">collections</a> and <a href="/exhibits">exhibitions</a>.</p>
<p></p>
        <div class="browse-items">
            <?php if ($total_results > 0): ?>
            <?php
                $sortLinks[__('Title')] = 'Dublin Core,Title';
                $sortLinks[__('Collection')] = 'Collection Name';
                ?>
                <div class="browse-items-header hidden-xs">
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-2 col-md-2 col-md-offset-2">
                            <?php echo browse_sort_links(array('Title'=>'Dublin Core,Title'), array('')); ?>
                        </div>
                        <div class="col-sm-3 col-md-2">
                            <?php echo browse_sort_links(array('Collection'=>'Collection Name'), array('')); ?>
                        </div>
                        <div class="hidden-sm col-md-2">
                            <?php echo browse_sort_links(array('Place'=>'Dublin Core,Coverage'), array('')); ?>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <?php echo browse_sort_links(array('Date'=>'Dublin Core,Date'), array('')); ?>
                        </div>
                    </div>
                </div>

                <?php foreach (loop('items') as $item): ?>
                <div class="item">
                    <div class="row">
                        <div class="col-sm-2 col-md-2">
                            <?php $image = $item->Files; ?>
                            <?php if ($image): ?> 
								<?php
								if (metadata('item', 'has thumbnail')):
		
                                    echo link_to_item('<div style="background-image: url(' . file_display_url($image[0], 'fullsize') . ');" class="img"></div>');
                                 else: 
                                    echo link_to_item('<div style="background-image: url(' . img('fallback-video.png') . ');" class="img"></div>');
                            endif;    
                            ?>
							<?php endif; ?>
                        </div>
                        <div class="col-sm-3 col-md-2">
                            <?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?>
                        </div>
                        <div class="col-sm-3 col-md-2">
                            <?php echo html_entity_decode(metadata('item', 'Collection Name')); ?>
                        </div>
                        <div class="hidden-sm col-md-2">
                            <?php echo metadata('item', array('Dublin Core', 'Coverage')); ?>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <?php echo metadata('item', array('Dublin Core', 'Date'), array('snippet'=>150)); ?>
                        </div>

                        <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-muted"><?php echo 'No items found.'; ?></p>
            <?php endif; ?>
        </div>
        <?php echo pagination_links(); ?>
        <?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
    </div>
</div>

<?php echo foot(); ?>
