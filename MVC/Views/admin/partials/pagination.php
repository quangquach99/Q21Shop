<?php

class Pagination {
    private $data = array();
    private $page = '';
    private $currentPage = 0;
    private $lastPage = 0;
    private $listPages = '';
    private $previousPage = 0;
    private $nextPage = 0;

    public function __construct($page, $data, $currentPage, $lastPage) {
        $this->page = $page;
        foreach($data as $item) {
            array_push($this->data,$item);
        }
        $this->currentPage = $currentPage;
        $this->lastPage = $lastPage;

        $this->previousPage = $this->currentPage - 1;
        $this->nextPage = $this->currentPage + 1;
    }

    public function main() {
        // Previous Page
        if($this->previousPage >= 0) {
            $this->listPages .= "<li class='page-item'>
                                <a class='page-link' href='".$_SESSION['mainUrl']."/admin/".$this->page."/".$this->previousPage . "'>Back</a>
                            </li>";
        }
        
        // Current Page
        for($i = 0; $i <= $this->lastPage; $i++) {
            $active = '';
            if($this->currentPage == $i) {
                $active = 'active';
            }
            $this->listPages .= "<li class='page-item ".$active."'>
                                <a class='page-link' href='".$_SESSION['mainUrl']."/admin/".$this->page."/".$i."'>".($i+1)."</a>
                            </li>";
        }

        // Next Page
        if($this->nextPage <= $this->lastPage) {
            $this->listPages .= "<li class='page-item'>
                                <a class='page-link' href='".$_SESSION['mainUrl']."/admin/".$this->page."/".$this->nextPage."'>Next</a>
                            </li>";
        }

        echo $this->listPages;
    }
}