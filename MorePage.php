<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 16/3/14
 * Time: 下午8:04
 */

namespace rayful\Tool\Pagination;


use rayful\Tool\URL;

class MorePage extends Pagination
{
    /**
     * 这是一个可以同时显示多页的分页显示方式.兼容前端框架Bootstrap的样式.
     */
    public function display()
    {
        $first = $this->getFirst();
        $end = $this->getEnd();
        $current = $this->getCurrent();
        if($first>=$end){
            return;
        }

        $prev = $current - 1;
        $prev_page_url = URL::append([$this->getKey()=>$prev]);

        $next = $current + 1;
        $next_page_url = URL::append([$this->getKey()=>$next]);

        echo "<nav aria-label=\"Page navigation\">";
        echo "<ul class='pagination'>";

        if($first < $current){
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"{$prev_page_url}\" aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
        }

        if(($current-2)>=$first){
            $first_page_url = URL::append([$this->getKey()=>$first]);
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"$first_page_url\">{$first}</a></li>";
        }

        if(($current-2)>$first){
            echo "<li class=\"page-item\"><a class=\"page-link\">...</a></li>";
        }

        if(($current-1)>=$first){
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"$prev_page_url\">".($current-1)."</a></li>";
        }

        echo "<li class='active'><a class=\"page-link\">{$current}</a></li>";

        if(($current+1)<=$end){
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"$next_page_url\">".($current+1)."</a></li>";
        }

        if($current==$first && ($current+2)<=$end){
            $next2_page_url = URL::append([$this->getKey()=>$next+1]);
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"$next2_page_url\">".($current+2)."</a></li>";
            if(($current+3)<$end){
                echo "<li class=\"page-item\"><a class=\"page-link\">...</a></li>";
            }
        }elseif(($current+2)<$end){
            echo "<li class=\"page-item\"><a class=\"page-link\">...</a></li>";
        }

        if(($current+2)<$end){
            $end_page_url = URL::append([$this->getKey()=>$end]);
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"$end_page_url\">{$end}</a></li>";
        }

        if($end > $current){
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"{$next_page_url}\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
        }

        echo "</ul>";
        echo "</nav>";
    }

}