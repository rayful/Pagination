<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 2017/8/13
 * Time: 上午8:09
 */

namespace rayful\Tool\Pagination\View;


use rayful\Tool\Pagination\PaginationInterface;

abstract class ViewBase
{
    private $pagination;

    public function __construct(PaginationInterface $pagination)
    {
        $this->pagination = $pagination;
    }

    public function __toString()
    {
        ob_start();
        $this->display();
        return ob_get_clean();
    }

    public function getPagination()
    {
        return $this->pagination;
    }

    public function getPageURL($page)
    {
        if($page){
            return $this->getPagination()->getNewURL($page);
        }
    }

    public function getPrevPageURL()
    {
        if ($page = $this->getPagination()->getPrevPage()) {
            return $this->getPageURL($page);
        }
    }

    public function getNextPageURL()
    {
        if ($page = $this->getPagination()->getNextPage()) {
            return $this->getPageURL($page);
        }
    }

    abstract public function display();
}