<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 16/2/5
 * Time: 下午9:42
 */

namespace rayful\Tool\Pagination;


use rayful\Tool\URL;

class Pagination implements PaginationInterface
{
    /**
     * 总纪录数（需要在构造函数时传入）
     * @var int
     */
    protected $totalRecord;

    /**
     * 每页显示多少
     * @var int
     */
    protected $limitRecord;

    /**
     * 经过计算的结果，返回给数据库查询用。跳过多少个。
     * @var int
     */
    protected $skipRecord;

    /**
     * 当前页码的请求变量名称。
     * @var string
     */
    protected $requestKey = "page";

    /**
     * 当前页数（如果不调用setCurrentPage设定，将自动自动从$_REQUEST那里读取）
     * @var int
     */
    protected $currentPage;

    /**
     * 第一页的页码。（固定为1，不允许修改）
     * @var int
     */
    protected $firstPage = 1;

    /**
     * 最后一页的页码。（需要计算出来）
     * @var int
     */
    protected $endPage;

    /**
     * 下一页的页码，如果当前页已经是最后页，则该属性为0
     * @var int
     */
    protected $nextPage;

    /**
     * 上一页的页码，如果当前页已经是最前页，则该属性为0
     * @var int
     */
    protected $prevPage;

    /**
     * Pagination constructor.
     * @param int $total 总纪录数
     * @param int $limit 每页显示多少条，默认为100
     */
    public function __construct($total, $limit = 100)
    {
        $this->totalRecord = intval($total);
        $this->limitRecord = intval($limit);
    }

    /**
     * 设定当前页码（如果不设置，默认从当前请求页的URL中读取）
     * @param $currentPage
     * @return $this
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    /**
     * 设定用来传递页码的request参数名称，如：page、p（如果不设定，则使用属性默认值）
     * @param $requestKey
     * @return $this
     */
    public function setRequestKey($requestKey)
    {
        $this->requestKey = $requestKey;
        return $this;
    }

    /**
     * 打印对象时返回的字符串。返回分页器的关键参数。如果前后端分离，可以直接使用这些参数来给前端程序分页。
     * @return string
     */
    public function __toString()
    {
        $obj = new \stdClass();
        $obj->totalRecord = $this->getTotalRecord();
        $obj->skipRecord = $this->getSkipRecord();
        $obj->limitRecord = $this->getLimitRecord();

        $obj->firstPage = $this->getFirstPage();
        $obj->currentPage = $this->getCurrentPage();
        $obj->endPage = $this->getEndPage();
        $obj->nextPage = $this->getNextPage();
        $obj->prevPage = $this->getPrevPage();

        return json_encode($obj);
    }

    /**
     * 返回总共有多少条记录
     * @return int
     */
    public function getTotalRecord()
    {
        return $this->totalRecord;
    }

    /**
     * 返回这次查询该跳过多少条记录（数据库查询用，根据每页条数、当前页两个当前属性计算得出）
     * @return int
     */
    public function getSkipRecord()
    {
        if (is_null($this->skipRecord)) {
            $this->initSkipRecord();
        }
        return $this->skipRecord;
    }

    /**
     * 返回每页限制显示多少条记录
     * @return int
     */
    public function getLimitRecord()
    {
        if (!$this->limitRecord) {
            $this->limitRecord = $this->totalRecord;
        }
        return $this->limitRecord;
    }

    /**
     * 总共有多少页
     * @return int
     */
    public function getTotalPage()
    {
        return $this->getEndPage() - $this->getFirstPage() + 1;
    }

    /**
     * 下一页的页码
     * @return int
     */
    public function getNextPage()
    {
        if (is_null($this->nextPage)) {
            $next = $this->getCurrentPage() + 1;
            $this->nextPage = ($next <= $this->getEndPage() ? $next : 0);
        }
        return $this->nextPage;
    }

    /**
     * 上一页的页码
     * @return int
     */
    public function getPrevPage()
    {
        if (is_null($this->prevPage)) {
            $prev = $this->getCurrentPage() - 1;
            $this->prevPage = ($prev >= $this->getFirstPage() ? $prev : 0);
        }
        return $this->prevPage;
    }

    /**
     * 当前页的页码
     * @return int
     */
    public function getCurrentPage()
    {
        if (is_null($this->currentPage)) {
            $this->initCurrentPage();
        }
        return $this->currentPage;
    }

    /**
     * 最后一页的页码
     * @return int
     */
    public function getEndPage()
    {
        if (is_null($this->endPage)) {
            $this->initEndPage();
        }
        return $this->endPage;
    }

    /**
     * 第一页的页码
     * @return int
     */
    public function getFirstPage()
    {
        return $this->firstPage;
    }

    /**
     * 根据新页码输出新的URL
     * @param int $page
     * @param null $url
     * @return string
     */
    public function getNewURL($page, $url = null)
    {
        $URL = new URL($url);
        $URL->setQuery([$this->getRequestKey() => $page]);
        return $URL->build();
    }

    /**
     * 返回用来传递页码的request参数
     * @return string
     */
    public function getRequestKey()
    {
        return $this->requestKey;
    }

    protected function initCurrentPage()
    {
        $current = isset($_REQUEST[$this->getRequestKey()]) ? intval($_REQUEST[$this->getRequestKey()]) : 1;
        $this->currentPage = $current;
    }

    protected function initSkipRecord()
    {
        $this->skipRecord = ($this->getCurrentPage() - 1) * $this->getLimitRecord();
    }

    protected function initEndPage()
    {
        if ($this->limitRecord)
            $this->endPage = ceil($this->totalRecord / $this->limitRecord);
    }
}