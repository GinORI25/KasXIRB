<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

public function getTotalPemasukan()
    {
        // $pemasukan = "SELECT sum(nominal) as pemasukan FROM transaksi WHERE jenis_transaksi = 'Pemasukan' ORDER BY sum(nominal)";
        // $this->db->from('transaksi');
        $this->db->select_sum('nominal');
        $this->db->from('transaksi');
        return $this->db->get_where('', array('jenis_transaksi' => 'Pemasukan'))->row_array();
    }

public function getTotalPengeluaran()
    {
        // $pemasukan = "SELECT sum(nominal) as pemasukan FROM transaksi WHERE jenis_transaksi = 'Pemasukan' ORDER BY sum(nominal)";
        // $this->db->from('transaksi');
        $this->db->select_sum('nominal');
        $this->db->from('transaksi');
        return $this->db->get_where('', array('jenis_transaksi' => 'Pengeluaran'))->row_array();
    }

    
    public function filterByTanggal($tanggal1, $tanggal2)
    {
        $query = $this->db->query("SELECT * FROM transaksi WHERE tanggal BETWEEN '$tanggal1' AND '$tanggal2'");
        return $query->result_array();
    }
    public function filterByTanggalPengeluaran($tanggal1, $tanggal2)
    {
        $query = $this->db->query("SELECT sum(nominal) as pengeluaran FROM transaksi WHERE tanggal BETWEEN '$tanggal1' AND '$tanggal2' AND jenis_transaksi='pengeluaran'");
        return $query->row_array();
    }
    public function filterByTanggalPemasukan($tanggal1, $tanggal2)
    {
    
        $query = $this->db->query("SELECT sum(nominal) as pemasukan  FROM transaksi WHERE tanggal BETWEEN '$tanggal1' AND '$tanggal2' AND jenis_transaksi ='pemasukan'");
        return $query->row_array();
    }
    
    public function filterLaporanPemasukan($tanggal1, $tanggal2)
    {
    
        $query = $this->db->query("SELECT * FROM transaksi WHERE tanggal BETWEEN '$tanggal1' AND '$tanggal2' AND jenis_transaksi ='pemasukan'");
        return $query->result_array();
    }

    public function filterLaporanPengeluaran($tanggal1, $tanggal2)
    {
    
        $query = $this->db->query("SELECT * FROM transaksi WHERE tanggal BETWEEN '$tanggal1' AND '$tanggal2' AND jenis_transaksi ='pengeluaran'");
        return $query->result_array();
    }
    
    public function saldo_awal($tanggal){
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi','pemasukan');
        $this->db->where('tanggal', $tanggal);
        $pemasukan = $this->db->get()->row()->total;

        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi','pengeluaran');
        $this->db->where('tanggal', $tanggal);
        $pengeluaran = $this->db->get()->row()->total;

        $saldo = $pemasukan - $pengeluaran;
        return $saldo;
    }
}