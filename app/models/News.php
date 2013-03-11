<?php 
class News extends Eloquent {

    protected $table = 'news';

    public function get_creation()
    {
        return date('d/m/Y', strtotime($this->created_at));
    }

    public function addPoint(){
        $this->points =  $this->points+1;
        $this->save();
    }
}