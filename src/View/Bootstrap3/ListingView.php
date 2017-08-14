<?php
/**
 * <nav aria-label="...">
 * <ul class="pagination">
 *
 * </ul>
 * </nav>
 * Created by PhpStorm.
 * User: kingmax
 * Date: 2017/8/13
 * Time: 下午12:59
 */

namespace rayful\Tool\Pagination\View\Bootstrap3;


use rayful\Tool\Pagination\View\ViewBase;

class ListingView extends ViewBase
{
    public function display()
    {
        if ($this->getPagination()->getEndPage() > $this->getPagination()->getFirstPage()) {
            $this->displayPrev();
            $this->displayFirstPage();
            $this->displayListing();
            $this->displayEndPage();
            $this->displayNext();
        }
    }

    protected function displayPrev()
    {
        $this->displayArrow($this->getPrevPageURL(), "Previous", "&laquo;");
    }

    protected function displayNext()
    {
        $this->displayArrow($this->getNextPageURL(), "Next", "&raquo;");
    }

    protected function displayFirstPage()
    {
        $page = $this->getPagination()->getFirstPage();
        $this->displayPage($page);
    }

    protected function displayEndPage()
    {
        $page = $this->getPagination()->getEndPage();
        $this->displayPage($page);
    }

    protected function displayListing()
    {
        $firstPage = $this->getPagination()->getFirstPage();
        $endPage = $this->getPagination()->getEndPage();
        $currentPage = $this->getPagination()->getCurrentPage();
        $currentPrevPage = $currentPage - 1;
        $currentNextPage = $currentPage + 1;

        if ($currentPrevPage - 1 > $firstPage) {
            $this->displayDot();
        }
        if ($currentPrevPage > $firstPage) {
            $this->displayPage($currentPrevPage);
        }
        if ($currentPage > $firstPage && $currentPage < $endPage) {
            $this->displayPage($currentPage);
        }
        if ($currentNextPage < $endPage) {
            $this->displayPage($currentNextPage);
        }
        if ($currentNextPage + 1 < $endPage) {
            $this->displayDot();
        }
    }

    protected function isInCurrentPage($page)
    {
        return $this->getPagination()->getCurrentPage() == $page;
    }

    protected function displayPage($page)
    {
        $URL = $this->getPagination()->getNewURL($page);
        if ($this->isInCurrentPage($page)) {
            echo "<li class=\"active\"><a href=\"$URL\">$page <span class=\"sr-only\">(current)</span></a></li>";
        } else {
            echo "<li><a href=\"$URL\">$page</a></li>";
        }
    }

    protected function displayArrow($URL, $text, $code)
    {
        $class = $URL ? "" : "disabled";
        echo "<li class=\"$class\"><a href=\"$URL\" aria-label=\"$text\"><span aria-hidden=\"true\">$code</span></a></li>";
    }

    protected function displayDot()
    {
        echo "<li><a>...</a></li>";
    }
}