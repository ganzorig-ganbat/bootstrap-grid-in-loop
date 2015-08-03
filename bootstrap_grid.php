<?php

class bootstrap_grid {
    // default sum col 12
    private $sum_col = 12;
    // default col 3
    private $col = 3;
    // default col_in_row 4
    private $col_in_row = 4;
    private $col_count = 0;

    private $row_open = false;
    private $col_open = false;

    public function set_sum_col($sum_col) {
        $this->sum_col = $sum_col;
    }

    // set column
    public function set_col($col){
        $this->col = $col;

        if($col != 0 ){
            $this->col_in_row = floor( $this->sum_col/$col );
        }
    }

    public function open_layout(){
        $return = '';

            $return .= $this->open_row();

        $return .= $this->open_col();

        return $return;
    }

    public function close_layout(){
        $return = '';

        $return .= $this->close_col();

        if( $this->col_count == $this->col )
            $return .= $this->close_row();

        return $return;
    }

    public function open_row() {
        if ( $this->row_open )
            return;

        $this->row_open = true;

        return '<div class="row">';
    }

    public function close_row() {
        $this->row_open = false;
        $this->col_count = 0;
        return '</div>';
    }

    public function is_row_open() {
        return $this->row_open;
    }

    public function open_col() {
        if ( $this->col_open )
            return;

        $this->col_open = true;
        $this->col_count++;

        return '<div class="col-md-'.$this->col_in_row.'">';
    }

    public function close_col() {
        $this->col_open = false;
        return '</div>';
    }

    public function close_all() {
        $return = '';

        if ($this->col_open){
            $return .= $this->close_col();
        }

        if ($this->row_open){
            $return .= $this->close_row();
        }

        return $return;
    }
}

?>
