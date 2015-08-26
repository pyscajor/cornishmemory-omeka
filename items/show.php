<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>

<div class="container single-item">
	<div class="itemshow">
    	<div class="content-block">
        <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
        <?php if (metadata('item', 'has files')): ?>
               <?php echo sckls_item_image_gallery(); ?>
        <?php else: ?>
            <p>Sorry, no image available.</p>
        <?php endif; ?>
        <nav>
            <ul class="pager">
                <li id="previous-item" class="previous"><?php echo link_to_previous_item_show('&larr; Previous'); ?></li>
                <li id="next-item" class="next"><?php echo link_to_next_item_show('Next &rarr;'); ?></li>
            </ul>
        </nav>
        <div class="row">
            <div class="col-sm-7">
                <h2>About this item</h2>
				<?php echo all_element_texts('item', array(false, false)); ?>




            </div>

            <div class="col-sm-5">
                <?php
                echo get_specific_plugin_hook_output('SocialBookmarking', 'public_items_show', array('view' => $this, 'item' => $item));
                ?>
                <hr>
                	<br>
									<h6><span class="fa fa-book"></span> Collection</h6>
                		<p><?php echo link_to_collection_for_item(); ?></p>
                		<br>
								<!-- The following prints a list of all tags associated with the item -->
                <?php if (metadata('item', 'has tags')): ?>
                <div id="item-tags" class="element">
                    <h6><span class="fa fa-tags"></span> <?php echo __('Tags'); ?></h6>
                    <div class="element-text"><?php echo tag_string('item'); ?></div>
                </div>
                <?php endif;?>
                <!-- End Tags -->
                <br>
								<br>
                <h6><span class="fa fa-pencil"></span> Citation</h6>
                <?php echo metadata('item', 'citation', array('no_escape' => true)); ?>
                <hr>
                <?php
                echo get_specific_plugin_hook_output('Corrections', 'public_items_show', array('view' => $this, 'item' => $item));
                ?>
				<hr>
            </div>

        </div>
		<?php
        echo get_specific_plugin_hook_output('Geolocation', 'public_items_show', array('view' => $this, 'item' => $item));
        ?>
		<hr>
        <h6>Item data</h6>
        <p>Metadata for this item is available in the following formats:
        <?php echo output_format_list(false, ' | '); ?></p>
		<hr>
        <?php
            $url = current_url();
            $pos = strpos($url, 'exhibits');
            if (!$pos): ?>
        <nav>
            <ul class="pager">
                <li id="previous-item" class="previous"><?php echo link_to_previous_item_show('&larr; Previous'); ?></li>
                <li id="next-item" class="next"><?php echo link_to_next_item_show('Next &rarr;'); ?></li>
            </ul>
        </nav>
        <?php else: echo '<br/>'; endif; ?>

		</div>
	</div>
</div>

<?php echo foot(); ?>
