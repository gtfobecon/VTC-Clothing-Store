<?php 
    class Dashboard_Model extends Base_Model{
        
        function select_quantity_each_category(){
            $query = "select sum(price),month(created_at) as month from orders where status = 'Đã giao' group by month(created_at)";
            $sth = $this->db->prepare($query);
            $sth->execute();
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            $sth->closeCursor();
            return $data;
        }
        function select_money_each_category(){
            $query = "select sum(t.price) as price ,c.name from categories c inner join products t on t.category_id = c.id inner join order_details o on t.id = o.product_id group by c.name;";
            $sth = $this->db->prepare($query);
            $sth->execute();
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            $sth->closeCursor();
            return $data;
        }
    }
?>