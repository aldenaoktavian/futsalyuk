<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mitra_lapangan extends CI_Model {

    public function do_login($email,$password)
    {
            $sql = "SELECT * FROM user_mitra_lapangan WHERE email = ? AND PASSWORD = ?";

        $queryRec = $this->db->query($sql,array($email,$password))->result_array();
        return $queryRec;
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

                ORDER BY d.nama_tipe ASC
                ";
        $result = $this->db->query($query)->row_array();

        return $result;
    }
	
}
