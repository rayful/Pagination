<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 2017/8/13
 * Time: 下午10:47
 */
require "autoload.php";
$pagination = new \rayful\Tool\Pagination\Pagination(40,30);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>
        Hello, world!
    </h1>
    <blockquote>
        共有:<?php echo $pagination->getTotalRecord()?>
        每页:<?php echo $pagination->getLimitRecord()?>
        分<?php echo $pagination->getTotalPage()?>页显示
        当前页:<?php echo $pagination->getCurrentPage()?>
        下页:<?php echo $pagination->getNextPage()?>
    </blockquote>
    <nav>
        <ul class="pagination">
            <?php
            echo new \rayful\Tool\Pagination\View\Bootstrap4\SimpleViewCN($pagination)
            ?>
        </ul>
    </nav>

    <nav>
        <ul class="pagination">
            <?php
            echo new \rayful\Tool\Pagination\View\Bootstrap4\SimpleViewEN($pagination)
            ?>
        </ul>
    </nav>

    <nav>
        <ul class="pagination justify-content-center">
            <?php
            echo new \rayful\Tool\Pagination\View\Bootstrap4\ListingView($pagination)
            ?>
        </ul>
    </nav>
</div>

</body>
</html>
