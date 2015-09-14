    </div>
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Who are we?</h3>
                    <p>cornishmemory.com is part of the Azook family. </p>
                    <p><a href="http://www.azook.org.uk"><img src="/cm-images/azook-logo-137px.png" alt="Azook logo" style="float:left; margin-right: 10px; margin-bottom: 20px"/></a>Azook Community Interest Company is a not-for-profit social enterprise dedicated to growing cultural confidence amongst Cornish communities by connecting people with their cultural heritage. </p>
                      <p>Find out more about <a href="http://azook.org.uk/">Azook CIC</a>.</p>
                      <p>Copyright &copy; Azook CIC, <?php echo date('Y'); ?> <?php echo option('site_title'); ?> and collection owners.</p>
                    <p>Please read our <a href="/terms" title="Terms and Conditions of Use">Terms and Conditions of Use</a></p>
                </div>
                <div class="col-sm-6">
                    <div class="row partners">
                        <h3>Funders</h3>
                        <img src="/cm-images/funders/hlf-logo.png" alt="Heritage Lottery Funded" />
                        <img src="/cm-images/funders/erdf-logo.jpg" alt="European Regional Development Fund" />
                        <img src="/cm-images/funders/ccf-logo.png" alt="Cornwall Community Fund" />
                        <img src="/cm-images/funders/cht-logo.png" alt="Cornwall Heritage Trust" />
                        <img src="/cm-images/funders/eff-logo.jpg" alt="European Fisheries Fund" />
                        <img src="/cm-images/funders/feast-logo.jpg" alt="FEAST" />
                        <img src="/cm-images/funders/visit-cornwall-logo.png" alt="Visit Cornwall" />
                    </div>
                </div>
            </div>
        </div>
	</footer>

    <div id="search-overlay" style="display: none;">
        <div class="container">
            <div class="close">&times;</div>
            <span class="glyphicon glyphicon-search"></span>
            <form id="search-omeka-container" action="<?php echo public_url(''); ?>search" class="clearfix">
                <?php echo search_form(array('show_advanced' => false)); ?>
            </form>
            <?php
                $googleCode = get_theme_option('Theme: Googlecode');
            ?>
            <?php if($googleCode && !empty($googleCode)): ?>
            <div id="search-library-container" class="hidden clearfix">
                <script>
                  function doSearchBox(){
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
                  setTimeout(doSearchBox, 0);
                </script>
                <gcse:searchbox-only resultsUrl="<?php echo url('/search?all'); ?>"></gcse:searchbox-only>
            </div>
            <input type="radio" name="search-type" id="search-omeka" checked /> <label for="search-omeka">Search this site</label>
            <input type="radio" name="search-type" id="search-library" /> <label for="search-library">Search all sites</label>
            <div class="pull-right"><?php echo link_to_item_search(__('Advanced Search')); ?></div>
            <?php endif; ?>
        </div>
    </div>
	<?php fire_plugin_hook('public_footer'); ?>
</div>
</body>
</html>
