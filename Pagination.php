<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 16/2/5
 * Time: 下午9:42
 */

namespace rayful\Tool\Pagination;


use rayful\Tool\URL;

class Pagination
{
    protected $total;
    protected $limit = 100;

    protected $current;
    protected $skip;
    protected $key = "page";

    protected $first = 1;
    protected $end;

    /**
     * @return string
     */
    function __toString()
    {
        ob_start();
        $this->display();
        return ob_get_clean();
    }

    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    public function setCurrent($current)
    {
        $this->current = $current;
        return $this;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function getSkip()
    {
        if (is_null($this->skip)) {
            $this->_setSkip();
        }
        return $this->skip;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getCurrent()
    {
        if (is_null($this->current)) {
            $this->_setCurrent();
        }
        return $this->current;
    }

    public function getLimit()
    {
        if (!$this->limit) {
            $this->limit = $this->total;
        }
        return $this->limit;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getEnd()
    {
        if (is_null($this->end)) {
            $this->_setEnd();
        }
        return $this->end;
    }

    public function getFirst()
    {
        return $this->first;
    }

    protected function _setCurrent()
    {
        $current = isset($_REQUEST[$this->getKey()]) ? intval($_REQUEST[$this->getKey()]) : 1;
        $this->current = $current;
    }

    protected function _setSkip()
    {
        $this->skip = ($this->getCurrent() - 1) * $this->getLimit();
    }

    protected function _setEnd()
    {
        if ($this->limit)
            $this->end = ceil($this->total / $this->limit);
    }

    /**
     * 这是默认的最普通的显示方式,只有上一页,下一页的文字.如果要其它显示方式,请建子类并重写此方法.
     */
    public function display()
    {
        $first = $this->getFirst();
        $end = $this->getEnd();
        $current = $this->getCurrent();

        echo "<nav>";
        echo "<ul class='pager'>";
        if ($first < $current) {
            $prev = $current - 1;
            $prev_page_url = URL::append([$this->getKey() => $prev]);
            echo "<li><a href=\"{$prev_page_url}\">上一页</a></li>";
        }

        if ($end > $current) {
            $next = $current + 1;
            $next_page_url = URL::append([$this->getKey() => $next]);
            echo "<li><a href=\"{$next_page_url}\">下一页</a></li>";
        }
        echo "</ul>";
        echo "</nav>";
    }
}