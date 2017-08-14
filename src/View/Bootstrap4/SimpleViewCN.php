<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 2017/8/13
 * Time: 下午11:08
 */

namespace rayful\Tool\Pagination\View\Bootstrap4;


class SimpleViewCN extends \rayful\Tool\Pagination\View\Bootstrap3\SimpleViewCN
{
    public function display()
    {
        if($url = $this->getPrevPageURL()){
            echo "<li class='page-item'><a class='page-link' href=\"$url\">上页</a></li> ";
        }

        if($url = $this->getNextPageURL()){
            echo "<li class='page-item'><a class='page-link' href=\"$url\">下页</a></li>";
        }
    }

}