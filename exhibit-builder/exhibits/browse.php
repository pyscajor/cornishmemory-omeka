<?php
    $title = __('Browse Exhibits');
    echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

<div class="container">
    <?php if (count($exhibits) > 0): ?>
        <?php $exhibitCount = 0; ?>

        <?php foreach (loop('exhibit') as $exhibit): ?>
            <div class="content-block exhibit">
                <?php $exhibitCount++; ?>
                <h1><?php echo link_to_exhibit(); ?></h1>
                <?php if ($exhibitImage = record_image($exhibit, 'square_thumbnail')): ?>
                    <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'exhibit-browse-image')); ?>
                <?php endif; ?>
                <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                <div class="description"><?php echo $exhibitDescription; ?>
                <p>View the <?php echo link_to_exhibit(); ?> exhibition.</div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <?php echo pagination_links(); ?>

    <?php else: ?>
        <div class="content-block">
            <h1>Browse all exhibits</h1>
            <p><?php echo __('There are no exhibits available yet.'); ?></p>
        </div>
    <?php endif; ?>
    </div>
</div>

<?php echo foot(); ?>
