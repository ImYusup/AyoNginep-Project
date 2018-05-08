<?php
    namespace App\TableData;
    use Cerbero\QueryFilters\QueryFilters;

class RoomFilters extends QueryFilters 
    {
        public function name($name) {
            if( !empty( $name ) ) {
                return $this->query->where('name', 'like', '%' . $name . '%');
            } else {
                return $this->query->all();
            }
        }
        public function district($disctrict){
            if( !empty( $disctrict ) ) {
                return $this->query->where('district', 'like', '%' . $disctrict . '%');
            } else {
                return $this->query->all();
            }
        }
        public function price($price){
            if( !empty( $price ) ) {
                $to = substr($price,strpos($price,"-")+1);
                $from = substr($price,0,strpos($price,"-"));
                if($price=='high'){
                    return $this->query->orderBy('rent', 'desc');
                }else if($from&&$to){
                    return $this->query->whereBetween('rent', [$from, $to]);
                }else if($price=='low'){
                    return $this->query;
                }
            } else {
                return $this->query;
            }
        }
    }
    ?>