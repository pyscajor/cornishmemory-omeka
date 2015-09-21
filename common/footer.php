    </div>
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Who are we?</h3>
                    <p>cornishmemory.com is part of the Azook family. </p>
                    <p><a href="http://www.azook.org.uk"><img src="/cm-images/azook-logo-137px.png" alt="Azook logo" style="float:left; margin: 15px 10px 30px 0px;"/></a>Azook Community Interest Company is a not-for-profit social enterprise dedicated to growing cultural confidence amongst Cornish communities by connecting people with their cultural heritage. </p>
                      <p>Find out more about <a href="http://azook.org.uk/">Azook CIC</a>.</p>
                      <p>Copyright &copy; Azook CIC, <?php echo date('Y'); ?> <?php echo option('site_title'); ?> and collection owners.</p>
                    <p>Please read our <a href="/terms" title="Terms and Conditions of Use">Terms and Conditions of Use</a></p>
                </div>
                <div class="col-sm-6">
                    <div class="row partners">
                        <h3>Funders</h3>
                        <a href="http://www.hlf.org.uk" title="Heritage Lottery Fund"><img src="/cm-images/funders/hlf-logo.png" alt="Heritage Lottery Funded" /></a>
                        <a href="http://ec.europa.eu/regional_policy/en/funding/erdf/" title="European Regional Development Fund"><img src="/cm-images/funders/erdf-logo.jpg" alt="European Regional Development Fund" /></a>
                        <a href="http://www.cornwallfoundation.com" title="Cornwall Community Foundation"><img src="/cm-images/funders/ccf-logo.png" alt="Cornwall Community Foundation" /></a>
                        <a href="http://www.cornwallheritagetrust.org" title="Cornwall Heritage Trust"><img src="/cm-images/funders/cht-logo.png" alt="Cornwall Heritage Trust" /></a>
                        <a href="http://ec.europa.eu/fisheries/cfp/eff/index_en.htm" title="European Fisheries Fund"><img src="/cm-images/funders/eff-logo.jpg" alt="European Fisheries Fund" /></a>
                        <a href="http://feastcornwall.org" title="FEAST"><img src="/cm-images/funders/feast-logo.jpg" alt="FEAST" /></a>
                        <a href="https://www.visitcornwall.com" title="Visit Cornwall"><img src="/cm-images/funders/visit-cornwall-logo.png" alt="Visit Cornwall" /></a>
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
