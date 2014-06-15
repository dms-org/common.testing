<?php 
/* @var $runner IDDigital\CMS\Common\Testing\TestRunner */ 
/* @var $title string */ 
?>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <style>
        #output {
            font-family: "Segoe UI", Arial, sans-serif;
            text-align: center;
            font-size: 15px;
            letter-spacing: 1px;
        }
        .defect {
            color: #c80000;
        }
        .stats {
            font-weight: bold;
        }
        .result {
            font-size: 20px;
        }
        </style>
    </head>
    <body>
        <pre id='output'>
            <?php $runner->run(); ?>
        </pre>
    </body>
</html>