<?php

/**
 * @file
 * Default view template to display a item in an RSS feed.
 *
 * @ingroup views_templates
 */
?>
<?php 
  // i have no idea why the RSS is snafu'd on this site but i'm 
  // hacking it up to make it work. -- Marc

  $linkexp = explode("node/",$link);
  if (!empty($linkexp[1])) {
    $linkexp2 = explode("%",$linkexp[1]); 
    $fixlink = "http://elisteincartoons.com/node/" . $linkexp2[0];
  }

  if (!empty($description)) {
    $fixdesc = str_replace("&lt;","<",$description);
    $fixdesc = str_replace("&gt;",">",$fixdesc);
    $fixdesc = str_replace("&amp;","&",$fixdesc);
    $fixdesc = str_replace("&quot;","\"",$fixdesc);
    $fixdesc = str_replace("&#039;","'",$fixdesc);
    $fixdesc = str_replace("src=\"/sites","src=\"http://elisteincartoons.com/sites",$fixdesc);
  }
  $fixtitle = str_replace("&amp;","&",$title);
  $fixtitle = str_replace("&amp;#039;","'",$fixtitle);
  $fixtitle = str_replace("&#039;","'",$fixtitle);
  
  $fixelements = str_replace("%3Ca%20href%3D%22/","",$item_elements);
  $fixelements = str_replace("%22%3Eview%3C/a%3E","",$fixelements);
?>
  <item>
    <title><?php print $fixtitle; ?></title>
    <link><?php print $fixlink; ?></link>
    <description><?php print $fixdesc; ?></description>
    <?php print $fixelements; ?>
  </item>
