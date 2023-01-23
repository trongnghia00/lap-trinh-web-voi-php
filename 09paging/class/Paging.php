<?php
class Paging
{
    public $limit;
    public $offset;

    /**
     * Constructor
     * 
     * @param integer $page Page Number
     * @param integer $articles_per_page Number articles per page
     */
    public function __construct($page, $articles_per_page)
    {
        $this->limit = $articles_per_page;

        $page = filter_var($page, FILTER_VALIDATE_INT, [
            'options' => [
                'default' => 1,
                'min_range' => 1
            ]
        ]);

        $this->offset = $articles_per_page * ($page - 1);
    }
}