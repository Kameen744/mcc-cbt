<!doctype html>
<html lang="en">
    <head>
        <title>Calculator</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Default Stylesheet -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Google Fonts -->
    <style>
    body { background-color:#fafafa;}
    </style>
    </head>

    <body>
    <div id="jquery-script-menu">
<div class="jquery-script-center">
<ul>
<li><a href="https://www.jqueryscript.net/other/Calculator-App-jQuery-Bootstrap.html">Download This Plugin</a></li>
<li><a href="https://www.jqueryscript.net/">Back To jQueryScript.Net</a></li>
</ul>
<div class="jquery-script-ads"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<div class="jquery-script-clear"></div>
</div>
</div>
        <div class="container" style="margin-top:150px;">
            <h1>Calculator App</h1>
            <label class="switch">
                <input type="checkbox">
                <span class="slider"></span>
            </label>
            <form>
                <input readonly id="display1" type="text" class="form-control-lg text-right">
                <input readonly id="display2" type="text" class="form-control-lg text-right">
            </form>
            
            <div class="d-flex justify-content-between button-row">
                <button id="left-parenthesis" type="button" class="operator-group">&#40;</button>
                <button id="right-parenthesis" type="button" class="operator-group">&#41;</button>
                <button id="square-root" type="button" class="operator-group">&#8730;</button>
                <button id="square" type="button" class="operator-group">&#120;&#178;</button>
            </div>
          
            <div class="d-flex justify-content-between button-row">
                <button id="clear" type="button">&#67;</button>
                <button id="backspace" type="button">&#9003;</button>
                <button id="ans" type="button" class="operand-group">&#65;&#110;&#115;</button>
                <button id="divide" type="button" class="operator-group">&#247;</button>
            </div>
            

            <div class="d-flex justify-content-between button-row">
                <button id="seven" type="button" class="operand-group">&#55;</button>
                <button id="eight" type="button" class="operand-group">&#56;</button>
                <button id="nine" type="button" class="operand-group">&#57;</button>
                <button id="multiply" type="button" class="operator-group">&#215;</button>
            </div>
        
            
            <div class="d-flex justify-content-between button-row">
                <button id="four" type="button" class="operand-group">&#52;</button>
                <button id="five" type="button" class="operand-group">&#53;</button> 
                <button id="six" type="button" class="operand-group">&#54;</button> 
                <button id="subtract" type="button" class="operator-group">&#8722;</button>
            </div>
     
            
            <div class="d-flex justify-content-between button-row">
                <button id="one" type="button" class="operand-group">&#49;</button> 
                <button id="two" type="button" class="operand-group">&#50;</button>
                <button id="three" type="button" class="operand-group">&#51;</button>
                <button id="add" type="button" class="operator-group">&#43;</button>
            </div>

            <div class="d-flex justify-content-between button-row">
                <button id="percentage" type="button" class="operand-group">&#37;</button>
                <button id="zero" type="button" class="operand-group">&#48;</button>
                <button id="decimal" type="button" class="operand-group">&#46;</button>
                <button id="equal" type="button">&#61;</button>
            </div>

        </div>
        
        <script src="<?php echo base_url()?>js/cal/main.js" type="text/javascript"></script>
        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
    </body>
</html>