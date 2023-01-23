<?php
class Paging
{
    public $limit;
    public $offset;

    public $previous;
    public $next;

    /**
     * Constructor
     * 
     * @param integer $page Page Number
     * @param integer $articles_per_page Number articles per page
     */
    public function __construct($page, $articles_per_page, $total_articles)
    {
        $this->limit = $articles_per_page;

        $page = filter_var($page, FILTER_VALIDATE_INT, [
            'options' => [
                'default' => 1,
                'min_range' => 1
            ]
        ]);

        if ($page > 1) {
            $this->previous = $page - 1;
        }

        $total_pages = ceil($total_articles / $articles_per_page);

        if ($page < $total_pages) {
            $this->next = $page + 1;
        }

        $this->offset = $articles_per_page * ($page - 1);
    }
}