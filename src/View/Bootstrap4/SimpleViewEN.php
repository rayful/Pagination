<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 2017/8/13
 * Time: 下午11:11
 */

namespace rayful\Tool\Pagination\View\Bootstrap4;


class SimpleViewEN extends \rayful\Tool\Pagination\View\Bootstrap3\SimpleViewEN
{
    public function display()
    {
        $this->displayArrow($this->getPrevPageURL(), "&laquo;");
        $this->displayArrow($this->getNextPageURL(), "&raquo;");
    }

    protected function displayArrow($URL, $text)
    {
        $class = $URL ? "" : "disabled";
        echo "<li class=\"page-item $class\"><a class=\"page-link\" href=\"$URL\">$text</a></li>";
    }
}