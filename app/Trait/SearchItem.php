<?php

namespace App\Trait;

trait SearchItem {
    private $temp;

    /**
     * Search item.
     */
    public function search($fields)
    {
        $this->temp = $this->model;

        if ($_GET['search_item'] ?? false) {
            for ($i=0; $i < count($fields); $i++) {
                if ($i === 0) {
                    $this->temp = $this->model::where($fields[$i], 'LIKE', '%' . $_GET['search_item'] . '%');
                }
                $this->temp = $this->temp->orWhere($fields[$i], 'LIKE', '%' . $_GET['search_item'] . '%');
            }
        }

        return $this->temp;
    }
}
