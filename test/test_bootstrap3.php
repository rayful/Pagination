<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 2017/8/13
 * Time: 下午10:02
 */
require "autoload.php";
$pagination = new \rayful\Tool\Pagination\Pagination(150,30);
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>
        Hello, world!
        <small>
            共有:<?php echo $pagination->getTotalRecord()?>
            每页:<?php echo $pagination->getLimitRecord()?>
            分<?php echo $pagination->getTotalPage()?>页显示
            当前页:<?php echo $pagination->getCurrentPage()?>
            下页:<?php echo $pagination->getNextPage()?>
        </small>
    </h1>
    <div class="row">
        <nav>
            <ul class="pager">
                <?php
                echo new \rayful\Tool\Pagination\View\Bootstrap3\SimpleViewCN($pagination);
                ?>
            </ul>
        </nav>
    </div>
    <div class="row">
        <nav>
            <ul class="pager">
                <?php
                echo new \rayful\Tool\Pagination\View\Bootstrap3\AlignedViewCN($pagination);
                ?>
            </ul>
        </nav>
    </div>
    <div class="row text-center">
        <nav>
            <ul class="pagination">
                <?php
                echo new \rayful\Tool\Pagination\View\Bootstrap3\ListingView($pagination);
                ?>
            </ul>
        </nav>
    </div>
</div>
</body>
</html>

