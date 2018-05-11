<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 11.05.2018
 */

namespace coffeeshop\libs;


class Pagination
{
    public $currentPage;
    public $perpage;
    public $total;
    public $countPages;
    public $uri;


    public function __construct($page, $perpage, $total){
        $this->perpage = $perpage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);
        $this->uri = $this->getParams();
    }

    /**
     *
     * @return string
     */
    public function getHtml(){
        $back = null; // BACK page
        $forward = null; // FORWARD page
        $startpage = null; // FIRST page
        $endpage = null; // LAST page
        $page2left = null; // second page on the left
        $page1left = null; // first page on the left
        $page2right = null; // second page on the right
        $page1right = null; // first page on the left

        if( $this->currentPage > 1 ){
            $back = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage - 1). "'>&lt;</a></li>";
        }
        if( $this->currentPage < $this->countPages ){
            $forward = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage + 1). "'>&gt;</a></li>";
        }
        if( $this->currentPage > 3 ){
            $startpage = "<li><a class='nav-link' href='{$this->uri}page=1'>&laquo;</a></li>";
        }
        if( $this->currentPage < ($this->countPages - 2) ){
            $endpage = "<li><a class='nav-link' href='{$this->uri}page={$this->countPages}'>&raquo;</a></li>";
        }
        if( $this->currentPage - 2 > 0 ){
            $page2left = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage-2). "'>" .($this->currentPage - 2). "</a></li>";
        }
        if( $this->currentPage - 1 > 0 ){
            $page1left = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage-1). "'>" .($this->currentPage-1). "</a></li>";
        }
        if( $this->currentPage + 1 <= $this->countPages ){
            $page1right = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage + 1). "'>" .($this->currentPage+1). "</a></li>";
        }
        if( $this->currentPage + 2 <= $this->countPages ){
            $page2right = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage + 2). "'>" .($this->currentPage + 2). "</a></li>";
        }

        return '<ul class="pagination btn-pagination">' . $startpage.$back.$page2left.$page1left.'<li class="active"><a>'.$this->currentPage.'</a></li>'.$page1right.$page2right.$forward.$endpage . '</ul>';
    }

    public function __toString(){
        return $this->getHtml();
    }

    /**
     * counts the number of all pages for all products
     * @return int count of all pages
     */
    public function getCountPages(){
        return ceil($this->total / $this->perpage) ?: 1;
    }

    /**
     * @param $page
     * @return int
     */
    public function getCurrentPage($page){
        if(!$page || $page < 1) $page = 1;
        if($page > $this->countPages) $page = $this->countPages;
        return $page;
    }

    public function getStart(){
        return ($this->currentPage - 1) * $this->perpage;
    }

    /**
     * parses the url like (?page=1) to arrays
     * @return string
     */
    public function getParams(){
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if(isset($url[1]) && $url[1] != ''){
            $params = explode('&', $url[1]);
            foreach($params as $param){
                if(!preg_match("#page=#", $param)) $uri .= "{$param}&amp;";
            }
        }
        return urldecode($uri);
    }

}