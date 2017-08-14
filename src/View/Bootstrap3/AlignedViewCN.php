<?php
/**
 * 用法：
 * <nav aria-label="...">
 * <ul class="pager">
 * <?php
 * echo new \rayful\Tool\Pagination\Bootstrap3\AlignedViewCN($pagination);
 * ?>
 * </ul>
 * </nav>
 * Created by PhpStorm.
 * User: kingmax
 * Date: 2017/8/13
 * Time: 下午12:01
 */

namespace rayful\Tool\Pagination\View\Bootstrap3;


use rayful\Tool\Pagination\View\ViewBase;

class AlignedViewCN extends ViewBase
{

    public function display()
    {
        $this->displayArrow($this->getPrevPageURL(), "previous", "<span aria-hidden=\"true\">&larr;</span> 上页");
        $this->displayArrow($this->getNextPageURL(), "next", "下页 <span aria-hidden=\"true\">&rarr;</span>");
    }

    protected function displayArrow($URL, $class, $text)
    {
        $isDisabled = $URL ? "" : "disabled";
        $href = $URL ? : "#";
        echo "<li class=\"$class $isDisabled\"><a href=\"$href\">$text</a></li>";
    }
}