<?php
    namespace App\TableData;
    use Cerbero\QueryFilters\QueryFilters;

class UserFilters extends QueryFilters 
    {
        public function name($name) {
            if( !empty( $name ) ) {
                return $this->query
                    ->where('first_name', 'like', '%' . $name . '%')
                    ->orWhere('last_name', 'like', '%' . $name . '%');
            } else {
                return $this->query;
            }
        }
        public function address($address) {
            if( !empty( $address ) ) {
                return $this->query
                    ->where('address', 'like', '%' . $address . '%');
            } else {
                return $this->query;
            }
        }
    }
    ?>