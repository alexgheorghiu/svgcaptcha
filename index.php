<!DOCTYPE html>
<html>
    <head>
        <title>SVGCaptcha - generate captcha in svg</title>   
        <meta name="description" content="Open source library to generate SVG captcha." />
        <meta name="keywords" content="captcha, svg, free, open source" />
        <link type="text/css" rel="stylesheet" href="./style.css"/>
        <script type="text/javascript" src="./ga.js"></script>
        <meta name="google-site-verification" content="E7uHO0sAOEeDzv07_kD8YogREnwz8nc2g76g2fXm0RE" />
    </head>
    <body>
        <div id="content">
            <h1 id="logo">SVGCaptcha</h1>
            
            <section>
                <h2>What is SVGCaptcha?</h2>
                <div class="description">
                    SVGCaptcha is a small library that creates captcha in SVG instead of PNG, GIF or JPG.<br/>
                    Instead of adding libraries on server and load the server with image creation you place this burden on client's browser.<br/>                    
                    <p/>
                    <a href="http://en.wikipedia.org/wiki/Scalable_Vector_Graphics">SVG</a> is becoming the de facto image standard for web and all modern browser support it.
                </div>
            </section>
            
            <section>
                <h2>See it in action</h2>
                <div class="description">
                    <img style="border: 1px solid gray;" src="./captcha.php?r=1"/>
                </div>
                
            </section>
            
            <section>
                <h2>Download</h2>
                <div  class="description">
                    You can download the latest version from <a href="https://bitbucket.org/scriptoid/svgcaptcha/downloads" target="_blank">here</a>.
                </div>
            </section>

            <section>
                <h2>Quick start</h2>                
                <div  class="description">
                    Simply include point the <code>src</code> of an image to captcha.php (ex: 
                    <code>&lt;img src="./captcha.php"/&gt;</code>
                    ) and it will:
                    <ul>
                        <li>Generate and render an SVG image in your browser </li>
                        <li>Store the random string in <code>$_SESSION['captcha']</code></li>
                    </ul>
                    
                    <span class="warning">Note:</span> For now only PHP library is available.
                </div>
                
            </section>                          
            
            <section>
                <h2>Fork us</h2>
                <div  class="description">
                    You can <a href="https://bitbucket.org/scriptoid/svgcaptcha" target="_blank">fork this project</a> on Bitbucket.
                </div>
            </section>

        </div>
	
	<hr/>
	<center>
	<?
        include './domains.php';
        print_domains();
        ?>
        </center>

    </body>
</html>