<?php echo head(); $searchRecordTypes = get_search_record_types(); ?>
<?php $query = $_SERVER['QUERY_STRING']; ?>
<?php if (substr( $query, 0, 3 ) === "all"): ?>
    <div class="container">
        <div class="content-block extra-padding">
            <h1>Search all sites</h1>
            <p>
                <?php $googleCode = get_theme_option('Theme: Googlecode'); ?>
                <script>
                  function doSearchResults(){
                      (function() {
                        var cx = '<?php echo $googleCode; ?>';
                        var gcse = document.createElement('script');
                        gcse.type = 'text/javascript';
                        gcse.async = true;
                        gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                            '//www.google.com/cse/cse.js?cx=' + cx;
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(gcse, s);
                      })();}
                  setTimeout(doSearchResults, 2000);
                </script>
                <gcse:searchresults-only></gcse:searchresults-only>
            </p>
        </div>
    </div>
<?php else: ?>
    <div class="container">
        <div class="content-block">
            <h1><?php echo __('Search Results'); ?> <?php echo search_filters(); ?> <small><?php echo __('(%s total)', $total_results); ?></small></h1>
            <?php if ($total_results): ?>
                <table id="search-results" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width:25%;"><?php echo __('Media');?></th>
                            <th style="width:50%;"><?php echo __('Title');?></th>
                            <th><?php echo __('Place');?></th>
                            <th><?php echo __('Date');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (loop('search_texts') as $searchText): ?>
                        <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
						<?php $recordType = $searchText['record_type']; ?>
						<?php set_current_record($recordType, $record); ?>
                        <tr>
                            <td style="width:25%;"><?php if ($recordImage = record_image($recordType, 'square_thumbnail', array('class' => 'gallery'))): ?>
                    <?php echo link_to($record, 'show', $recordImage, array('class' => 'searchimage')); ?>


                <?php endif; ?></td>
                            <td style="width:50%;">
                                <a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a>
                            </td>
                            <td><?php echo metadata('item', array('Dublin Core', 'Coverage')); ?></td>
                            <td><?php echo metadata('item', array('Dublin Core', 'Date'), array('snippet'=>150)); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php echo pagination_links(); ?>
            <?php else: ?>
            <div id="no-results">
                <p><?php echo __('Your query returned no results.');?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php echo foot(); ?>
