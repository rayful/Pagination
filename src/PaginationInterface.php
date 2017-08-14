<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 2017/8/13
 * Time: 上午9:32
 */

namespace rayful\Tool\Pagination;


interface PaginationInterface
{
    /**
     * 返回总共有多少条记录
     * @return int
     */
    public function getTotalRecord();

    /**
     * 返回每页限制显示多少条记录
     * @return int
     */
    public function getLimitRecord();

    /**
     * 返回这次查询该跳过多少条记录（数据库查询用，根据每页条数、当前页两个当前属性计算得出）
     * @return int
     */
    public function getSkipRecord();

    /**
     * 总共有多少页
     * @return int
     */
    public function getTotalPage();

    /**
     * 第一页的页码
     * @return int
     */
    public function getFirstPage();

    /**
     * 当前页的页码
     * @return int
     */
    public function getCurrentPage();

    /**
     * 最后一页的页码
     * @return int
     */
    public function getEndPage();

    /**
     * 下一页的页码
     * @return int
     */
    public function getNextPage();

    /**
     * 上一页的页码
     * @return int
     */
    public function getPrevPage();

    /**
     * 根据新页码输出新的URL
     * @param int $page 新页码
     * @param string $url 当前URL，如果不传入，将默认将自动读取$_SERVER全局变量
     * @return array
     */
    public function getNewURL($page, $url = null);
}