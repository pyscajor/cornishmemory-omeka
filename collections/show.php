<?php
$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
if ($collectionTitle == '') {
    $collectionTitle = __('[Untitled]');
}
?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); ?>

<div class="container">
    <div class="content-block">
        <h1><?php echo $collectionTitle; ?></h1>
		
        <p><?php echo metadata('collection', array('Dublin Core', 'Description')); ?></p>
		<p><span class="fa fa-binoculars"></span><?php echo link_to_items_browse(__(' View all items in the %s Collection', $collectionTitle), array('collection' => metadata('collection', 'id'))); ?></p>
		<h2>Browse first 10 items</h2>
        
        <?php if (metadata('collection', 'total_items') > 0): ?>
        <div class="browse-items">
            <?php
                $sortLinks[__('Title')] = 'Dublin Core,Title';
                $sortLinks[__('Creator')] = 'Dublin Core,Collection';
                ?>
            <div class="browse-items-header hidden-xs">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-2 col-md-2 col-md-offset-2">
                        <?php echo browse_sort_links(array('Title'=>'Dublin Core,Title'), array('')); ?>
                    </div>
                    <div class="col-sm-3 col-md-2">
                        <?php // echo browse_sort_links(array('Collection'=>'Dublin Core,Collection'), array('')); ?>
                    </div>
                    <div class="hidden-sm col-md-2">
                        Place
                    </div>
                    <div class="col-sm-4 col-md-4">
                        Date
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
                        <?php echo metadata('item', array('Dublin Core', 'Creator')); ?>
                    </div>
                    <div class="hidden-sm col-md-2">
                        <?php echo metadata('item', array('Dublin Core', 'Coverage')); ?>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <?php echo metadata('item', array('Dublin Core', 'Date'), array('snippet'=>150)); ?>
                    </div>
                
                    <?php // fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
					
                </div>
            </div>
            <?php endforeach; ?>
            <?php echo pagination_links(); ?>
        </div>
        <?php else: ?>
            <div class="alert alert-warning">There are currently no items within this collection.</div>
        <?php endif; ?>

        <?php // fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
    </div>
</div>

<?php echo foot(); ?>
