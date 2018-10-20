<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./index.php');
   exit;
}

?>
<!------------------------------------>
<?php
if (session_id() == "")
{
   session_start();
}
?>


<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="en-GB">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2018.0.0.379"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.watch.js", "webpro.js", "musewpdisclosure.js", "jquery.museresponsive.js", "require.js", "index.css"], "outOfDate":[]};
</script>
<script>
  function go(loc) {
    document.getElementById('iiii').src = loc;
  } 
  </script> 
  <title>Home</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?crc=4149879804"/>
  <link rel="stylesheet" type="text/css" href="css/index.css?crc=3852468016" id="pagesheet"/>
  <!-- IE-only CSS -->
  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/nomq_preview_master_a-master.css?crc=3793157388"/>
  <link rel="stylesheet" type="text/css" href="css/nomq_index.css?crc=4059844672" id="nomq_pagesheet"/>
  <![endif]-->
    <!--custom head HTML-->
  <style>
  html, body {
    max-width: 100%;
	min-height: 100%;
    overflow-x: hidden;
	background-color:#f8f8f8 !important; 
}
#u163 {
    height: 100vh;
    position: fixed;
    top: 0px;
}
.iframesa {
    left: 20px;
}
.topbar {
    position:fixed;
}
#u607 {
    height: 100vh;
    overflow: hidden;
}
#u737 {
    height: 100vh;
    overflow: hidden;
}
#u418 {
    height: 100%;
	position: relative;
}
#pu418 {
   background-color:#f8f8f8;
}
</style>
 </head>
 <body onload="go('NDIMlogo.html');">

  <div class="breakpoint active" id="bp_infinity" data-min-width="321"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox" id="page"><!-- group -->
    <div class="clearfix grpelem" id="pu163"><!-- group -->
     <div class="sidebar" id="u163"><!-- simple frame --></div>
     <div class="clearfix shared_content" id="u2555" data-content-guid="u2555_content"><!-- group -->
      <div id="u855"><!-- simple frame --></div>
      <div id="u856"><!-- simple frame --></div>
      <div id="u857"><!-- simple frame --></div>
     </div>
     <div class="clearfix shared_content" id="u1502" data-content-guid="u1502_content"><!-- group -->
      
      <div class="clearfix" id="u1141-4" style="width:auto !important; right: 45px !important;" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true"><!-- content -->
       <p>
	   <a href="index.php" id="LoginName1" style="color:#B6DCFE;">
	   <?php
if (isset($_SESSION['username']))
{
   echo $_SESSION['fullname'];
}
else
{
   echo 'Login';
}
?>
	   </a>
	   </p>
	   </div>
	   
	   <div class="clip_frame" id="u1142" style="position: absolute !important; right: -3px !important; top: 0px;"><!-- image -->
       <img class="block temp_no_img_src" id="u1142_img" data-orig-src="images/icons8_user_50px_1.png?crc=4251792939" alt="" width="24" height="24" src="images/blank.gif?crc=4208392903"/>
      </div>
	  
      
     </div>
     <div id="u344" z-index="1" onclick="go('about.php')"><!-- simple frame -->
     <div class="clearfix" id="u2028"><!-- group -->
      <div class="clip_frame" id="u1724"><!-- image -->
       <img class="block temp_no_img_src" id="u1724_img" data-orig-src="images/about.png?crc=456240839" alt="" width="26" height="26" src="images/blank.gif?crc=4208392903"/>
      </div>
      <div class="helptext clearfix" id="u225-4" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true"><!-- content -->
       <p>About</p>
      </div>
     </div>
    </div>
	</div>
    <div class="clearfix grpelem" id="pu94"><!-- column -->
     <div class="browser_width colelem" id="u94-bw">
      <div class="topbar" id="u94"><!-- group -->
       <div class="clearfix" id="u94_align_to_page">
        <div class="clearfix grpelem" id="u128-4" data-sizePolicy="fixed" data-pintopage="page_fluidx"><!-- content -->
         <p>NDIM Alumini Web App</p>
        </div>
        <div style="z-index: -1;" class="clearfix grpelem shared_content" id="u407-3" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true" data-content-guid="u407-3_content"><!-- content -->
         
        </div>
       </div>
      </div>
     </div>
     <div class="clearfix colelem" id="pppu190" ><!-- group -->
      <div class="clearfix grpelem" id="ppu190" ><!-- column -->
       <div class="clearfix colelem" id="pu190" style="position: fixed !important;"><!-- group -->
        <div class="clearfix grpelem" id="u190" ><!-- group -->
         <div class="clearfix grpelem" id="u169-4" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- content -->
          <p>Post</p>
         </div>
         <div class="grpelem" id="u166" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" onclick="go('NDIM.php')"><!-- simple frame --></div>
        </div>
        <div class="clip_frame grpelem" id="u263" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- image -->
         <img class="block temp_no_img_src" id="u263_img" data-orig-src="images/icons8_paper_plane_52px.png?crc=523532399" alt="" width="24" height="24" src="images/blank.gif?crc=4208392903"/>
        </div>
       </div>
       <div class="clearfix colelem" id="pu206" style="position: fixed !important; top:100px !important;"><!-- group -->
        <div class="clearfix grpelem" id="u206"><!-- group -->
         <div class="clearfix grpelem" id="u207-4" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- content -->
          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Timeline</p>
         </div>
         <div class="grpelem" id="u208" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" onclick="go('blank.php')"><!-- simple frame --></div>
        </div>
        <div class="grpelem" id="u273" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- simple frame --></div>
        <div class="clip_frame grpelem" id="u300" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- image -->
         <img class="block temp_no_img_src" id="u300_img" data-orig-src="images/icons8_gallery_48px.png?crc=3974233723" alt="" width="24" height="24" src="images/blank.gif?crc=4208392903"/>
        </div>
       </div>
       <div class="clearfix colelem" id="pu224" style="position: fixed !important; top:150px !important;"><!-- group -->
        <div class="clearfix grpelem" id="u224"><!-- group -->
         <div class="clearfix grpelem" id="u217-4" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- content -->
          <p>&nbsp;&nbsp; Profile</p>
         </div>
         <div class="grpelem" id="u226" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" onclick="go('profile.php')"><!-- simple frame --></div>
        </div>
        <div class="grpelem" id="u338" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- simple frame --></div>
        <div class="clip_frame grpelem" id="u347" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- image -->
         <img class="block temp_no_img_src" id="u347_img" data-orig-src="images/icons8_male_user_50px.png?crc=345306953" alt="" width="24" height="24" src="images/blank.gif?crc=4208392903"/>
        </div>
       </div>
       <div class="colelem" id="u341" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" style="position: fixed !important; top:198px !important;"><!-- simple frame --></div>
      </div>
      <div class="iframesa size_fluid_width grpelem" id="u418" data-sizePolicy="fluidWidth" data-pintopage="page_fixedLeft"><!-- custom html -->
       <span class="shared_content" data-content-guid="u418_0_content">
<!--iFrame builder widget is developed by the developer team of creativated.com-->
        <iframe id='iiii' onload="iframeLoaded()" src="NDIMlogo.html" width="100%" height="100%" allowtransparency="true" frameborder="0" scrolling="no"></iframe>
        <script type="text/javascript">
  function iframeLoaded() {
	  var iFrameID = document.getElementById('iiii');
      if(iFrameID) {
            // here you can make the height, I delete it first, then I make it again
            iFrameID.height = "";
            iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + "px";
			if (screen && screen.width < 321) {
				iFrameID.width  = screen.width -25 +'px';
			}
			
      }   
  }
</script>
	</span>
      </div>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="40" data-content-above-spacer="500" data-content-below-spacer="460" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
   </div>
  </div>
  <div class="breakpoint" id="bp_320" data-max-width="320"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- group -->
    <div class="clearfix grpelem temp_no_id" data-orig-id="pu94"><!-- group -->
     <div class="browser_width grpelem temp_no_id" data-orig-id="u94-bw">
      <div class="topbar temp_no_id" data-orig-id="u94"><!-- simple frame --></div>
     </div>
     <span class="clearfix grpelem placeholder" data-placeholder-for="u407-3_content"><!-- placeholder node --></span>
    </div>
    <div class="clearfix grpelem" id="pu418"><!-- group -->
     <div class="iframesa size_fluid_width temp_no_id" data-sizePolicy="fluidWidth" data-pintopage="topleft" data-orig-id="u418"><!-- custom html -->
      <span class="placeholder" data-placeholder-for="u418_0_content"><!-- placeholder node --></span>
     </div>
     <span class="clearfix placeholder" data-placeholder-for="u2555_content"><!-- placeholder node --></span>
     <ul class="AccordionWidget clearfix" id="accordionu801"><!-- vertical box -->
      <li class="AccordionPanel clearfix colelem" id="u810"><!-- vertical box --><div class="AccordionPanelTab helptext clearfix colelem" id="u811-3" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- content --><div id="u811-2"><p>&nbsp;</p></div></div><div class="AccordionPanelContent disn clearfix colelem" id="u812"><!-- group --><div class="clearfix grpelem" id="u737"><!-- group --><div class="sidebar-copy clearfix grpelem" id="u607"><!-- column --><div class="clearfix colelem" id="pu608"><!-- group --><div class="clearfix grpelem" id="u608"><!-- group --><div class="clearfix grpelem" id="u610-4" data-sizePolicy="fixed" data-pintopage="page_fixedCenter"><!-- content --><p>Post</p></div><div class="grpelem" id="u609" data-sizePolicy="fixed" data-pintopage="page_fixedCenter" onclick="go('NDIM.php')"><!-- simple frame --></div></div><div class="clip_frame grpelem" id="u620" data-sizePolicy="fixed" data-pintopage="page_fixedCenter" data-leftAdjustmentDoneBy="pu608"><!-- image --><img class="block temp_no_img_src" id="u620_img" data-orig-src="images/icons8_paper_plane_52px.png?crc=523532399" alt="" width="26" height="26" src="images/blank.gif?crc=4208392903"/></div></div><div class="clearfix colelem" id="pu611"><!-- group --><div class="clearfix grpelem" id="u611"><!-- group --><div class="clearfix grpelem" id="u613-4" data-sizePolicy="fixed" data-pintopage="page_fixedCenter"><!-- content --><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Timeline</p></div><div class="grpelem" id="u612" data-sizePolicy="fixed" data-pintopage="page_fixedCenter"  onclick="go('blank.php')"><!-- simple frame --></div></div><div class="grpelem" id="u622" data-sizePolicy="fixed" data-pintopage="page_fixedCenter" data-leftAdjustmentDoneBy="pu611"><!-- simple frame --></div><div class="clip_frame grpelem" id="u626" data-sizePolicy="fixed" data-pintopage="page_fixedCenter" data-leftAdjustmentDoneBy="pu611"><!-- image --><img class="block temp_no_img_src" id="u626_img" data-orig-src="images/icons8_gallery_48px.png?crc=3974233723" alt="" width="26" height="26" src="images/blank.gif?crc=4208392903"/></div></div><div class="clearfix colelem" id="pu617"><!-- group --><div class="clearfix grpelem" id="u617"><!-- group --><div class="clearfix grpelem" id="u618-4" data-sizePolicy="fixed" data-pintopage="page_fixedCenter"><!-- content --><p>&nbsp;&nbsp; Profile</p></div><div class="grpelem" id="u619" data-sizePolicy="fixed" data-pintopage="page_fixedCenter" onclick="go('profile.php')"><!-- simple frame --></div></div><div class="grpelem" id="u625" data-sizePolicy="fixed" data-pintopage="page_fixedCenter" data-leftAdjustmentDoneBy="pu617"><!-- simple frame --></div><div class="clip_frame grpelem" id="u628" data-sizePolicy="fixed" data-pintopage="page_fixedCenter" data-leftAdjustmentDoneBy="pu617"><!-- image --><img class="block temp_no_img_src" id="u628_img" data-orig-src="images/icons8_male_user_50px.png?crc=345306953" alt="" width="26" height="26" src="images/blank.gif?crc=4208392903"/></div></div><div class="clearfix colelem" id="pu624"><!-- group --><div class="grpelem" id="u624" data-sizePolicy="fixed" data-pintopage="page_fixedCenter" data-leftAdjustmentDoneBy="pu624"><!-- simple frame --></div><div class="clearfix grpelem" id="u2546"><!-- group --><div class="clearfix grpelem" id="u614"><!-- group --><div class="helptext clearfix grpelem" id="u616-4" data-sizePolicy="fixed" data-pintopage="page_fixedCenter"><!-- content --><p>About</p></div><div class="grpelem" id="u615" data-sizePolicy="fixed" data-pintopage="page_fixedCenter" onclick="go('about.php')"><!-- simple frame --></div></div><div class="clip_frame grpelem" id="u630" data-sizePolicy="fixed" data-pintopage="page_fixedCenter"><!-- image --><img class="block temp_no_img_src" id="u630_img" data-orig-src="images/icons8_help_64px.png?crc=395666412" alt="" width="26" height="26" src="images/blank.gif?crc=4208392903"/></div></div></div></div></div></div></li>
     </ul>
     <span class="clearfix placeholder" data-placeholder-for="u1502_content"><!-- placeholder node --></span>
     <div class="clearfix" id="u2327-4" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true"><!-- content -->
      <p>NDIM AWA</p>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="40" data-content-above-spacer="503" data-content-below-spacer="460" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
   </div>
  </div>
  <!-- Other scripts -->
  <script type="text/javascript">
   // Decide weather to suppress missing file error or not based on preference setting
var suppressMissingFileError = false
</script>
  <script type="text/javascript">
   window.Muse.assets.check=function(d){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},c=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},g=function(g){for(var f=document.getElementsByTagName("link"),h=0;h<f.length;h++)if("text/css"==f[h].type){var i=(f[h].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!i||!i[1]||!i[2])break;b[i[1]]=i[2]}f=document.createElement("div");f.className="version";f.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(f);for(h=0;h<Muse.assets.required.length;){var i=Muse.assets.required[h],l=i.match(/([\w\-\.]+)\.(\w+)$/),k=l&&l[1]?
l[1]:null,l=l&&l[2]?l[2]:null;switch(l.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");f.className+=" "+k;k=a(c(f,"color"));l=a(c(f,"backgroundColor"));k!=0||l!=0?(Muse.assets.required.splice(h,1),"undefined"!=typeof b[i]&&(k!=b[i]>>>24||l!=(b[i]&16777215))&&Muse.assets.outOfDate.push(i)):h++;f.className="version";break;case "js":h++;break;default:throw Error("Unsupported file type: "+l);}}d?d().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
f.parentNode.removeChild(f);if(Muse.assets.outOfDate.length||Muse.assets.required.length)f="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",g&&Muse.assets.outOfDate.length&&(f+="\nOut of date: "+Muse.assets.outOfDate.join(",")),g&&Muse.assets.required.length&&(f+="\nMissing: "+Muse.assets.required.join(",")),suppressMissingFileError?(f+="\nUse SuppressMissingFileError key in AppPrefs.xml to show missing file error pop up.",console.log(f)):alert(f)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?
setTimeout(function(){g(!0)},5E3):g()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.watch","webpro","musewpdisclosure","jquery.museresponsive"],function(d){var $ = d;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.browser_width');/* resize height */
Muse.Utils.requestAnimationFrame(function() { $('body').addClass('initialized'); });/* mark body as initialized */
Muse.Utils.makeButtonsVisibleAfterSettingMinWidth();/* body */
Muse.Utils.initWidget('#accordionu801', ['#bp_320'], function(elem) { return new WebPro.Widget.Accordion(elem, {canCloseAll:true,defaultIndex:-1}); });/* #accordionu801 */
Muse.Utils.fullPage('#page');/* 100% height page */
$( '.breakpoint' ).registerBreakpoint();/* Register breakpoints */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=4157109226" type="text/javascript" async data-main="scripts/museconfig.js?crc=380897831" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
