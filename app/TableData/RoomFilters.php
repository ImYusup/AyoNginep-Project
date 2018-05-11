<?php
    namespace App\TableData;
    use Cerbero\QueryFilters\QueryFilters;

class RoomFilters extends QueryFilters 
    {
        public function name($name) {
            if( !empty( $name ) ) {
                return $this->query->where('name', 'like', '%' . $name . '%');
            } else {
                return $this->query;
            }
        }

        public function district($district){
            if( !empty( $district ) ) {
                return $this->query->where('district', 'like', '%' . $district . '%');
            } else {
                return $this->query;
            }
        }

        public function city($city){
            if( !empty( $city ) ) {
                return $this->query->where('city', 'like', '%' . $city . '%');
            } else {
                return $this->query;
            }
        }

        public function address_detail($address_detail){
            if( !empty( $address_detail ) ) {
                return $this->query->where('address_detail', 'like', '%' . $address_detail . '%');
            } else {
                return $this->query;
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
                    return $this->query->orderBy('rent', 'asc');
                }
            } else {
                return $this->query->orderBy('rent', 'asc');
            }
        }

        public function keyword($keyword){
            if($keyword){
                return $this->query
                ->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('district', 'LIKE', '%' . $keyword . '%')
                ->orWhere('city', 'LIKE', '%' . $keyword . '%')
                ->orWhere('address_detail', 'LIKE', '%' . $keyword . '%')
                ->orWhereHas('categories', function($q) use ($keyword){
                    $q->where('name', 'LIKE', '%' . $keyword . '%');
                });
            }else{
                return $this->query;
            }
        }
    }