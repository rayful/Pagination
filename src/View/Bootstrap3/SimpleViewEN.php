<?php
/**
 * 用法：
 * <nav aria-label="...">
 * <ul class="pager">
 * <?php
 * echo new \rayful\Tool\Pagination\Bootstrap3\SimpleViewEN($pagination);
 * ?>
 * </ul>
 * </nav>
 * Created by PhpStorm.
 * User: kingmax
 * Date: 2017/8/13
 * Time: 下午12:00
 */

namespace rayful\Tool\Pagination\View\Bootstrap3;


use rayful\Tool\Pagination\View\ViewBase;

class SimpleViewEN extends ViewBase
{

    public function display()
    {
        if($url = $this->getPrevPageURL()){
            echo "<li><a href=\"$url\">Previous</a></li> ";
        }

        if($url = $this->getNextPageURL()){
            echo "<li><a href=\"$url\">Next</a></li> ";
        }
    }
}