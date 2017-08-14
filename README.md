# Pagination
一个简单通用分页类。包含分页器类（Pagination）及显示类（在View命名空间下，可通过继承ViewBase类进行扩展及自定义显示逻辑及CSS样式）。

# Pagination Interface 接口能力
```
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
```
# 界面相关
```
<?php
$pagination = new \rayful\Tool\Pagination\Pagination($count, $limit);
// 两个入参分别是总记录数、每页数
// 一般这个变量在controller生成，或者通过DB-Manager里面的DataSet生成，然后在渲染模板的时候传进去
?>
<nav aria-label="...">
    <ul class="pager">
        <?php
        echo new \rayful\Tool\Pagination\Bootstrap3\AlignedViewCN($pagination);
        ?>
    </ul>
</nav>
```

## 界面类说明
* Bootstrap3 命名空间：\rayful\Tool\Pagination\Bootstrap3\
** AlignedViewCN: [https://getbootstrap.com/docs/3.3/components/#pagination-pager]
** ListingView:[https://getbootstrap.com/docs/3.3/components/#pagination-default]
** SimpleViewEN/SimpleViewCN:[https://getbootstrap.com/docs/3.3/components/#pagination-pager]
* Bootstrap4 命名空间：\rayful\Tool\Pagination\Bootstrap4\
** ListingView:[https://getbootstrap.com/docs/4.0/components/pagination/]
** SimpleViewEN/SimpleViewCN:样式请见test文件
* 自定义：请扩展ViewBase类，实现display()方法，可自定义显示逻辑及CSS和HTML样式。