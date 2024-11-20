<?php
namespace App\Models;
use CodeIgniter\Model;

class Customer extends Model {
    protected $table = 'customer';

    public function getDataCustomer($searchTerm = null) {
        $query = "SELECT *
                  FROM customer
                  WHERE LOWER(CONCAT(fname, ' ', COALESCE(mi, ''), ' ', lname)) LIKE LOWER(?)
                  ORDER BY customer_id";
    
        // Wrap the search term with '%' for the LIKE clause
        $likeTerm = "%$searchTerm%";
    
        // Execute the query with placeholders
        return $this->db->query($query, [$likeTerm])->getResult();
    }
}
