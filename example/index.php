<?php

include __DIR__ . "/../vendor/autoload.php";
use Seboettg\CiteProc\StyleSheet;
use Seboettg\CiteProc\CiteProc;

$dataString = file_get_contents("data.json");
$style = StyleSheet::loadStyleSheet("elsevier-vancouver");
$citeProc = new CiteProc($style, "en-US");
$data = json_decode($dataString);
$bibliography = $citeProc->render($data, "bibliography");
$cssStyles = $citeProc->renderCssStyles();
?>
<html>
<head>
    <title>CSL Test</title>
    <style type="text/css" rel="stylesheet">

        article {
            min-width: 300px;
            max-width: 600px;
            width: 50%;
            margin: 0 auto;
        }

        h3 {
            border-bottom: 1px solid #000;
        }

        .csl-entry {
            margin: 0.5em 0;
        }

        <?php echo "\n" . $cssStyles; ?>
    </style>
</head>
<body>
<article>
<h1>Lorem Ipsum</h1>
<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing
    elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
    eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum
    dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
    Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet
    <?php echo $citeProc->render($data, "citation", json_decode('[{"id":"ITEM-4"}]')); ?>.</p>

<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat
    nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue
    duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
    nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat
    <?php echo $citeProc->render($data, "citation", json_decode('[{"id":"ITEM-2"}]')); ?>.</p>

<p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
    consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore
    eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril
    delenit augue duis dolore te feugait nulla facilisi.</p>

<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
    assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet
    dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
    lobortis nisl ut aliquip ex ea commodo consequat <?php echo $citeProc->render($data, "citation", json_decode('[{"id":"ITEM-1"}]')); ?>.</p>

<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat
    nulla facilisis <?php echo $citeProc->render($data, "citation", json_decode('[{"id":"ITEM-3"}]')); ?>.</p>

<p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
    ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
    invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et
    ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet
    <?php echo $citeProc->render($data, "citation", json_decode('[{"id":"ITEM-3"},{"id":"ITEM-4"}]')); ?>.</p>

<h3>Literature</h3>
<?php echo $bibliography; ?>
</article>

</body>
</html>