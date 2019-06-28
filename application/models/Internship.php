<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internship extends CI_Model {    

    public function getRekapByMonth($month){
        $query ="select DISTINCT institute,
                day(date_start) as 'startDay',
                case  
                when month(date_start) = 1 then 'Januari'
                when month(date_start) = 2 then 'Februari'
                when month(date_start) = 3 then 'Maret'
                when month(date_start) = 4 then 'April'
                when month(date_start) = 5 then 'Mei'
                when month(date_start) = 6 then 'Juni'
                when month(date_start) = 7 then 'Juli'
                when month(date_start) = 8 then 'Agustus'
                when month(date_start) = 9 then 'September'
                when month(date_start) = 10 then 'Oktober'
                when month(date_start) = 11 then 'November'
                when month(date_start) = 12 then 'Desember'
                END as 'StartMonth',
                year(date_start) as 'satrtYear', day(date_end) as 'endDay',
                case  
                when month(date_end) = 1 then 'Januari'
                when month(date_end) = 2 then 'Februari'
                when month(date_end) = 3 then 'Maret'
                when month(date_end) = 4 then 'April'
                when month(date_end) = 5 then 'Mei'
                when month(date_end) = 6 then 'Juni'
                when month(date_end) = 7 then 'Juli'
                when month(date_end) = 8 then 'Agustus'
                when month(date_end) = 9 then 'September'
                when month(date_end) = 10 then 'Oktober'
                when month(date_end) = 11 then 'November'
                when month(date_end) = 12 then 'Desember'
                END as 'endMonth',
                year(date_end) as 'endYear', id_kelompok as 'kelompok',
                guide,place from internship where month(date_start) = ".$month.
                " order by year(date_start),month(date_start),day(date_start)";
        return $this->db->query($query)->result();
    }    

    public function getCountAllByYear($year){
        return $this->db->get_where("internship",['year(date_start)'=>$year])->num_rows();
    }
    
    public function getRekapByStartDatePKL($month,$year){
        $query ="select distinct id_kelompok as 'kelompok',institute, 
        day(date_start) as 'startDay',month(date_start) as 'StartMonth',year(date_start) as 'satrtYear', 
        day(date_end) as 'endDay',month(date_end) as 'endMonth',year(date_end) as 'endYear',place,guide 
        from internship where month(date_start) = ".$month." and year(date_start) = ".$year 
        ;
        return $this->db->query($query)->result();
    }

    public function getCountByStartDatePKL($month,$year){        
        $query ="select id from internship where month(date_start) = ".$month." and year(date_start)=".$year;
        return $this->db->query($query)->num_rows();
    }
    
    public function getCountByEndDatePKL($monthStart,$yearStart,$monthEnd,$yearEnd){        
        $query ="
        select id from internship where month(date_start) = ".$monthStart." and year(date_start) = ".$yearStart.
        " and month(date_end) >=".$monthEnd." and year(date_end) = ".$yearEnd;
        return $this->db->query($query)->num_rows();
    }

    public function getNameByKelompok($kelompok){
        $query ="select id,is_sekolah,fullname from internship where id_kelompok = ".$kelompok;
        return $this->db->query($query)->result();
    }

    public function getRekapBalasanByKelompok($kelompok){
        $query ="select department, day(date_start) as 'startDay',
        case  
        when month(date_start) = 1 then 'Januari'
        when month(date_start) = 2 then 'Februari'
        when month(date_start) = 3 then 'Maret'
        when month(date_start) = 4 then 'April'
        when month(date_start) = 5 then 'Mei'
        when month(date_start) = 6 then 'Juni'
        when month(date_start) = 7 then 'Juli'
        when month(date_start) = 8 then 'Agustus'
        when month(date_start) = 9 then 'September'
        when month(date_start) = 10 then 'Oktober'
        when month(date_start) = 11 then 'November'
        when month(date_start) = 12 then 'Desember'
        END as 'StartMonth',
        year(date_start) as 'satrtYear', day(date_end) as 'endDay',
        case  
        when month(date_end) = 1 then 'Januari'
        when month(date_end) = 2 then 'Februari'
        when month(date_end) = 3 then 'Maret'
        when month(date_end) = 4 then 'April'
        when month(date_end) = 5 then 'Mei' 
        when month(date_end) = 6 then 'Juni'
        when month(date_end) = 7 then 'Juli'
        when month(date_end) = 8 then 'Agustus'
        when month(date_end) = 9 then 'September'
        when month(date_end) = 10 then 'Oktober'
        when month(date_end) = 11 then 'November'
        when month(date_end) = 12 then 'Desember'
        END as 'endMonth',guide,
        year(date_end) as 'endYear' from internship where id_kelompok= ".$kelompok;
        return $this->db->query($query)->row();
    }    

    public function getRekapByEndDatePKL($monthStart,$yearStart,$monthEnd,$yearEnd){
        $query ="
        select distinct id_kelompok as 'kelompok',institute, 
        day(date_start) as 'startDay',month(date_start) as 'StartMonth',year(date_start) as 'satrtYear', 
        day(date_end) as 'endDay',month(date_end) as 'endMonth',year(date_end) as 'endYear',place,guide 
        from internship where month(date_start) = ".$monthStart." and year(date_start) = ".$yearStart." 
        and month(date_end) >=".$monthEnd."
        and year(date_end) = " .$yearEnd;
        return $this->db->query($query)->result();
    }

    public function getCountByStatus($status){
        // $status = $status."";
        $query="select count(id) as 'jumlah'  from internship WHERE lower(status) ='".$status."'"; 
        return $this->db->query($query)->row();

    }
    


}
