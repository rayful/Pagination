<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 2017/8/13
 * Time: 下午10:58
 */

namespace rayful\Tool\Pagination\View\Bootstrap4;


class ListingView extends \rayful\Tool\Pagination\View\Bootstrap3\ListingView
{
    protected function displayPage($page)
    {
        $URL = $this->getPagination()->getNewURL($page);
        if ($this->isInCurrentPage($page)) {
            echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"$URL\">$page <span class=\"sr-only\">(current)</span></a></li>";
        } else {
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"$URL\">$page</a></li>";
        }
    }

    protected function displayArrow($URL, $text, $code)
    {
        $class = $URL ? "" : "disabled";
        echo "<li class=\"page-item $class\"><a class=\"page-link\" href=\"$URL\" aria-label=\"$text\"><span aria-hidden=\"true\">$code</span></a></li>";
    }

    protected function displayDot()
    {
        echo "<li class=\"page-item\"><a class=\"page-link\">...</a></li>";
    }

}