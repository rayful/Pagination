<?php
/**
 * 用法：
 * <nav aria-label="...">
 * <ul class="pager">
 * <?php
 * echo new \rayful\Tool\Pagination\Bootstrap3\SimpleViewCN($pagination);
 * ?>
 * </ul>
 * </nav>
 * Created by PhpStorm.
 * User: kingmax
 * Date: 2017/8/13
 * Time: 上午8:07
 */

namespace rayful\Tool\Pagination\View\Bootstrap3;


use rayful\Tool\Pagination\View\ViewBase;

class SimpleViewCN extends ViewBase
{
    public function display()
    {
        if($url = $this->getPrevPageURL()){
            echo "<li><a href=\"$url\">上页</a></li> ";
        }

        if($url = $this->getNextPageURL()){
            echo "<li><a href=\"$url\">下页</a></li>";
        }
    }
}