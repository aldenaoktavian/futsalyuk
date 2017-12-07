<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mitra_lapangan extends CI_Model {

    public function do_login($email,$password)
    {
            $sql = "SELECT *, ( SELECT MAX(id) FROM lapangan WHERE id_mitra = a.id ) AS id_lapangan FROM user_mitra_lapangan a WHERE a.email = ? AND a.password = ?";

        $queryRec = $this->db->query($sql,array($email,$password))->row_array();
        return $queryRec;
    }

    public function get_data_mitra($id_mitra)
    {
        $result = $this->db->get_where('user_mitra_lapangan', array('id'=>$id_mitra))->row_array();

        return $result;
    }

    public function update_mitra_byid($data, $id_mitra)
    {
        $update = $this->db->update('user_mitra_lapangan', $data, array('id'=>$id_mitra));

        return $update;
    }

    public function get_all_lapangan($id_mitra)
    {
        $sql = "SELECT * FROM lapangan WHERE id_mitra = ? ";

        $queryRec = $this->db->query($sql,array($id_mitra))->result_array();
        return $queryRec;
    }

    public function get_data_lapangan($id_lapangan)
    {
        $sql = "SELECT * FROM lapangan WHERE id = ? ";

        $queryRec = $this->db->query($sql,array($id_lapangan))->row_array();
        return $queryRec;
    }

    public function add_lapangan($data)
    {
        $insert = $this->db->insert('lapangan', $data);

        return $insert;
    }

    public function update_by_md5($data, $id)
    {
        $this->db->where('md5(id)', $id);
        $update = $this->db->update('lapangan', $data);

        return $update;
    }

    public function get_all_tipe($id_lapangan)
    {
        $sql = "SELECT * FROM tipe_lapangan WHERE id_lapangan = ? ";

        $queryRec = $this->db->query($sql,array($id_lapangan))->result_array();
        return $queryRec;
    }

    public function get_type($id_lapangan, $id_tipe=0)
    {
        if($id_tipe == 0){
            $sql = "SELECT * FROM tipe_lapangan WHERE id_lapangan = '".$id_lapangan."' AND id_tipe = ( SELECT MAX(id_tipe) FROM tipe_lapangan WHERE id_lapangan = '".$id_lapangan."' )";    
        } else{
            $sql = "SELECT * FROM tipe_lapangan WHERE id_lapangan = '".$id_lapangan."' AND id_tipe = ".$id_tipe;
        }

        $queryRec = $this->db->query($sql)->row_array();

        return $queryRec;
    }

    public function update_type($data, $id_tipe)
    {
        $this->db->where('md5(id_tipe)', $id_tipe);
        $update = $this->db->update('tipe_lapangan', $data);

        return $update;
    }

    public function add_type($data)
    {
        $insert = $this->db->insert('tipe_lapangan', $data);

        return $this->db->insert_id();
    }

    public function add_galery_type($data)
    {
        $insert = $this->db->insert('foto_lapangan', $data);

        return $this->db->insert_id();
    }

    public function delete_galery_type($id)
    {
        $delete = $this->db->delete('foto_lapangan', $id);

        return $delete;
    }

    public function all_transaction($id_lapangan, $startdate='', $enddate='')
    {
        $sort_date = '';
        /*if($startdate != '' && $enddate != ''){
            $sort_date = " AND ( a.tanggal >= '".$startdate."' AND a.tanggal <= '".$enddate."' )";
        }*/
        if($startdate != ''){
            $sort_date = " AND a.tanggal = '".$startdate."'";
        }

        $query = "SELECT a.*, d.nama_tipe, c.member_booking_firstname AS firstname, c.member_booking_lastname AS lastname 

                FROM transaksi a 
                LEFT JOIN user b ON a.id_user = b.id_user 
                LEFT JOIN member_booking c ON b.id_user = c.user_id 
                INNER JOIN tipe_lapangan d ON a.id_tipe = d.id_tipe 

                WHERE d.id_lapangan = '".$id_lapangan."' 
                ".$sort_date." 

                ORDER BY d.nama_tipe ASC
                ";
        $result = $this->db->query($query)->result_array();

        return $result;
    }

    public function get_transaction($id_tipe, $starttime, $endtime, $startdate='', $enddate='')
    {
        $sort_date = '';
        /*if($startdate != '' && $enddate != ''){
            $sort_date = " AND ( a.tanggal >= '".$startdate."' AND a.tanggal <= '".$enddate."' )";
        }*/
        if($startdate != ''){
            $sort_date = " AND a.tanggal = '".$startdate."'";
        }

        $query = "SELECT a.*, d.nama_tipe, c.member_booking_firstname AS firstname, c.member_booking_lastname AS lastname 

                FROM transaksi a 
                LEFT JOIN user b ON a.id_user = b.id_user 
                LEFT JOIN member_booking c ON b.id_user = c.user_id 
                INNER JOIN tipe_lapangan d ON a.id_tipe = d.id_tipe 

                WHERE a.id_tipe = '".$id_tipe."' 
                AND a.start_time = '".$starttime."' 
                AND a.end_time = '".$endtime."'
                ".$sort_date." 
                AND a.transaksi_status != 2 

                ORDER BY d.nama_tipe ASC
                ";
        $result = $this->db->query($query)->row_array();

        return $result;
    }

    public function add_transaction($data)
    {
        $insert = $this->db->insert('transaksi', $data);

        return $this->db->insert_id();
    }

    public function get_transaction_bycode($where)
    {
        $result = $this->db->get_where('transaksi', $where)->row_array();

        return $result;
    }

    public function update_transaction($data, $transaksi_id)
    {
        $this->db->where('transaksi_id', $transaksi_id);
        $update = $this->db->update('transaksi', $data);

        return $update;
    }

    public function update_member($data, $wherefield, $wherevalue)
    {
        $this->db->where($wherefield, $wherevalue);
        $update = $this->db->update('member_booking', $data);

        return $update;
    }

    public function all_transaction_con($fields, $where=array(), $orderfield='a.tanggal', $ordertype='DESC')
    {
        $this->db->join('tipe_lapangan b', 'a.id_tipe = b.id_tipe', 'inner');
        $this->db->join('member_booking c', 'a.id_user = c.user_id', 'inner');
        $this->db->order_by($orderfield, $ordertype);
        $result = $this->db->select($fields)->get_where('transaksi a', $where)->result_array();

        return $result;
    }

    public function sum_transaction_con($where=array(), $orderfield='a.tanggal', $ordertype='DESC')
    {
        $this->db->join('tipe_lapangan b', 'a.id_tipe = b.id_tipe', 'inner');
        $this->db->join('member_booking c', 'a.id_user = c.user_id', 'inner');
        $this->db->order_by($orderfield, $ordertype);
        $result = $this->db->select('SUM(deposit) AS total')->get_where('transaksi a', $where)->row_array();

        return $result['total'];
    }

    public function all_tarik_deposit($where=array())
    {
        $result = $this->db->get_where('mitra_tarik_deposit', $where)->result_array();

        return $result;
    }

    public function add_tarik_deposit($data)
    {
        $insert = $this->db->insert('mitra_tarik_deposit', $data);

        return $this->db->insert_id();
    }

    public function detail_tarik_deposit($id, $is_md5=false)
    {
        if($is_md5 == true){
            $this->db->where('md5(id)', $id);
        } else{
            $this->db->where('id', $id);
        }

        $result = $this->db->get('mitra_tarik_deposit')->row_array();

        return $result;
    }

    public function update_tarik_deposit($data, $where)
    {
        $update = $this->db->update('mitra_tarik_deposit', $data, $where);

        return $update;
    }

    public function sum_tarik_dana($where)
    {
        $result = $this->db->select('SUM(jml_tarik_deposit) AS total')->get_where('mitra_tarik_deposit', $where)->row_array();

        return $result['total'];
    }

    public function get_laporan_keuangan_harian($tipe, $startdate, $enddate)
    {
        $query = "SELECT 
                a.*, 
                (
                    CASE WHEN d.member_id != 'NULL' 
                        THEN CONCAT(member_social_firstname, ' ', member_social_lastname) 
                        ELSE 
                            CASE WHEN e.member_booking_id != 'NULL' 
                                THEN CONCAT(member_booking_firstname, ' ', member_booking_lastname) 
                                ELSE 'BOOKING OFFLINE'
                            END
                    END
                ) AS fullname, 
                (HOUR(end_time) - HOUR(start_time)) AS waktu, 
                ( 
                    CASE WHEN a.transaksi_status != 2 
                        THEN ((HOUR(end_time) - HOUR(start_time)) * c.tarif )
                        ELSE 0
                    END
                ) AS pendapatan 

                FROM transaksi a 
                LEFT JOIN user b ON a.id_user = b.id_user 
                INNER JOIN tipe_lapangan c ON a.id_tipe = c.id_tipe 
                LEFT JOIN member_social d ON d.user_id = b.id_user  
                LEFT JOIN member_booking e ON e.user_id = b.id_user 

                WHERE a.id_tipe = ".$tipe."
                AND a.tanggal >= '".$startdate."' AND a.tanggal <= '".$enddate."'";
        $result = $this->db->query($query)->result_array();

        return $result;
    }

    public function get_laporan_keuangan_bulanan($tipe, $startdate, $enddate)
    {
        $query = "SELECT 
                MONTH(a.tanggal) AS bulan, 
                MONTHNAME(a.tanggal) AS bulan_huruf, 
                YEAR(a.tanggal) AS tahun, 
                SUM((HOUR(end_time) - HOUR(start_time))) AS waktu, 
                SUM( 
                    CASE WHEN a.transaksi_status != 2 
                        THEN ((HOUR(end_time) - HOUR(start_time)) * c.tarif )
                        ELSE 0
                    END
                ) AS pendapatan, 
                SUM(deposit) AS deposit 

                FROM transaksi a 
                LEFT JOIN user b ON a.id_user = b.id_user 
                INNER JOIN tipe_lapangan c ON a.id_tipe = c.id_tipe 
                LEFT JOIN member_social d ON d.user_id = b.id_user  
                LEFT JOIN member_booking e ON e.user_id = b.id_user 

                WHERE a.id_tipe = ".$tipe."
                AND a.tanggal >= '".$startdate."' AND a.tanggal <= '".$enddate."'

                GROUP BY YEAR(a.tanggal), MONTH(a.tanggal)";
        $result = $this->db->query($query)->result_array();

        return $result;
    }

    public function get_laporan_keuangan_tahunan($tipe, $startdate, $enddate)
    {
        $query = "SELECT  
                YEAR(a.tanggal) AS tahun, 
                SUM((HOUR(end_time) - HOUR(start_time))) AS waktu, 
                SUM( 
                    CASE WHEN a.transaksi_status != 2 
                        THEN ((HOUR(end_time) - HOUR(start_time)) * c.tarif )
                        ELSE 0
                    END
                ) AS pendapatan, 
                SUM(deposit) AS deposit 

                FROM transaksi a 
                LEFT JOIN user b ON a.id_user = b.id_user 
                INNER JOIN tipe_lapangan c ON a.id_tipe = c.id_tipe 
                LEFT JOIN member_social d ON d.user_id = b.id_user  
                LEFT JOIN member_booking e ON e.user_id = b.id_user 

                WHERE a.id_tipe = ".$tipe."
                AND a.tanggal >= '".$startdate."' AND a.tanggal <= '".$enddate."'

                GROUP BY YEAR(a.tanggal)";
        $result = $this->db->query($query)->result_array();

        return $result;
    }
}
