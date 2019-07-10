<!-- 
    Nama        : Eko Ramadhanu Aryputra
    tanggal     :
    keguanaan   : kelas ini digunakan sebagai logik untuk menampilkan 
                  berbagai data dalam tabel intership yang digunakan
 -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internship extends CI_Model {    

    /**
     * method ini digunakan sebagai untuk mengambil data
     * intsitusi, hari mulai, bulan mulai,tahun mulai,
     * hari berkhir, bulan berakhir,tahun berakhir lokasi magang,
     * id_kelompok, dan pembimbing
     * berdarakan awal bulan magang.
     * 
     * method ini terdapat satu paramatere $month 
     * $method : parameter berupa int atau angka yang berisi bulan mulai magang
     * 
     * output : mengembalikan array of object yang terdiri dari 
     * institute,startDay,StartMonth,satrtYear,endDay
     * endMonth,endYear,kelompok
     */
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
    
    public function getLimitAndOffset($limit,$offset,$year = null,$like = null){
        if($year&&$like){
            $query ="select DISTINCT institute,status,
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
            guide,place from internship where year(date_start) =".$year." and fullname like '%".$like."%' order by year(date_start) desc, month(date_start) asc
            limit ".$limit." offset ".$offset;
            return $this->db->query($query)->result();
        }else if($like){
            $query ="select DISTINCT institute,status,
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
            guide,place from internship where fullname like '%".$like."%' order by year(date_start) desc, month(date_start) asc
            limit ".$limit." offset ".$offset;
            return $this->db->query($query)->result();
        }else if($year){
            $query ="select DISTINCT institute,status,
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
            guide,place from internship where year(date_start) = ".$year." order by year(date_start) desc, month(date_start) asc
            limit ".$limit." offset ".$offset;
            return $this->db->query($query)->result();
        }else{
            $query ="select DISTINCT institute,status,
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
                guide,place from internship order by year(date_start) desc, month(date_start) asc
                limit ".$limit." offset ".$offset;
            return $this->db->query($query)->result();
        }
    }  

    public function getCountAll($year = null, $like = null){
        if($year&&$like){
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
                guide,place from internship where year(date_start) = ".$year." and fullname like '%".$like."%'";
            return $this->db->query($query)->num_rows();
        }else if($like){
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
                guide,place from internship where fullname like '%".$like."%'";
            return $this->db->query($query)->num_rows();
        }else if($year){
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
                guide,place from internship where year(date_start) = ".$year;
            return $this->db->query($query)->num_rows();
        }else{
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
                guide,place from internship";
            return $this->db->query($query)->num_rows();
        }
    }  
    /**
     * method ini digunakan sebagai untuk mengambil banyak data
     * berdarakan tahun.
     * 
     * method ini terdapat satu paramatere $year 
     * $year : parameter berupa int atau angka yang berisi tahun
     * 
     * output: mengembalikan banyaknya data dalam bentuk int atau angka
     */
    public function getCountAllByYear($year){
        return $this->db->get_where("internship",['year(date_start)'=>$year])->num_rows();
    }

    /**
     * method ini digunakan sebagai untuk mengambil  data
     * intsitusi, hari mulai, bulan mulai,tahun mulai,
     * hari berkhir, bulan berakhir,tahun berakhir lokasi magang,
     * id_kelompok, dan pembimbing
     * berdarakan tahun dan bulan mulai magang.
     * 
     * method ini terdapat dua paramatere $year 
     * $year  : parameter berupa int atau angka yang berisi tahun mulai magang
     * $month : parameter berupa int atau angka yang berisi bulan mulai magang
     * 
     * output : mengembalikan array of object yang terdiri dari 
     * institute,startDay,StartMonth,satrtYear,endDay
     * endMonth,endYear,kelompok
     */
    public function getRekapByStartDatePKL($month,$year){
        $query ="select distinct id_kelompok as 'kelompok',institute, 
        day(date_start) as 'startDay',month(date_start) as 'StartMonth',year(date_start) as 'satrtYear', 
        day(date_end) as 'endDay',month(date_end) as 'endMonth',year(date_end) as 'endYear',place,guide 
        from internship where status = 'terdaftar' and month(date_start) = ".$month." and year(date_start) = ".$year 
        ;
        return $this->db->query($query)->result();
    }

    /**
     * method ini digunakan untuk mengambil banyak data 
     * berdasarkan bulan dan tahun mulai magang
     * 
     * method ini ada dua parameter 
     * $year  : parameter berupa int atau angka yang berisi tahun mulai magang
     * $month : parameter berupa int atau angka yang berisi bulan mulai magang
     * 
     * output : mengebalikan banyaknya jumlah magang
     */
    public function getCountByStartDatePKL($month,$year){        
        $query ="select id from internship where status = 'terdaftar'and month(date_start) = ".$month." and year(date_start)=".$year;
        return $this->db->query($query)->num_rows();
    }
    
    /**
     * method ini digunakan untuk mencari data pemagang yang masih magang 
     * pada bulan sebelumnya
     * 
     * method ini ada empat parameter 
     * $monthStart : parameter berupa int atau angka yang berisi bulan awal magang
     * $yearSart  : parameter berupa int atau angka yang berisi tahun awal magang
     * $monthEnd : parameter berupa int atau angka yang berisi bulan akhir magang
     * $yearEnd  : parameter berupa int atau angka yang berisi tahun akhir magang
     * 
     * output :  mengembalikan banyak nya data 
     */
    public function getCountByEndDatePKL($monthStart,$yearStart,$monthEnd,$yearEnd){        
        $query ="
        select id from internship where status = 'terdaftar' and month(date_start) = ".$monthStart." and year(date_start) = ".$yearStart.
        " and month(date_end) >=".$monthEnd." and year(date_end) = ".$yearEnd;
        return $this->db->query($query)->num_rows();
    }

    /**
     * method ini digunakan untuk mencari list kelompok pemagang
     * 
     * method ini ada satu parameter 
     * $kelompok : parameter berupa int atau angka yang berisi id_kelompok
     * 
     * output :  mengembalikan banyak nya data 
     */
    public function getNameByKelompok($kelompok){
        $query ="select id,is_sekolah,fullname from internship where id_kelompok = ".$kelompok;
        return $this->db->query($query)->result();
    }

    /**
     * method ini digunakan untuk mencari list kelompok pemagang
     * 
     * method ini ada satu parameter 
     * $kelompok : parameter berupa int atau angka yang berisi id_kelompok
     * 
     * output :  mengembalikan array of object yang berisi 
     * department,startDay,StartMonth,satrtYear,endDay,endMonth
     * guide,endYear
     * 
     */
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

    /**
     * method ini digunakan untuk mencari data pemagang yang masih magang 
     * pada bulan sebelumnya
     * 
     * method ini ada empat parameter 
     * $monthStart : parameter berupa int atau angka yang berisi bulan awal magang
     * $yearSart  : parameter berupa int atau angka yang berisi tahun awal magang
     * $monthEnd : parameter berupa int atau angka yang berisi bulan akhir magang
     * $yearEnd  : parameter berupa int atau angka yang berisi tahun akhir magang
     * 
     * output :  mengembalikan array of object yang berisi
     */
    public function getRekapByEndDatePKL($monthStart,$yearStart,$monthEnd,$yearEnd){
        $query ="
        select distinct id_kelompok as 'kelompok',institute, 
        day(date_start) as 'startDay',month(date_start) as 'StartMonth',year(date_start) as 'satrtYear', 
        day(date_end) as 'endDay',month(date_end) as 'endMonth',year(date_end) as 'endYear',place,guide 
        from internship where status='terdaftar' and month(date_start) = ".$monthStart." and year(date_start) = ".$yearStart." 
        and month(date_end) >=".$monthEnd."
        and year(date_end) = " .$yearEnd;
        return $this->db->query($query)->result();
    }

    public function getCountByStatusAndYear($status,$year){
        // $status = $status."";
        $query="select count(id) as 'jumlah'  from internship WHERE lower(status) ='".$status."' and year(date_start) =".$year; 
        return $this->db->query($query)->row();

    }

    public function getCountByGenderAndYear($gender,$year){
        $query="select count(id) as 'jumlah' from internship where gender= '".$gender."' and year(date_start) = ".$year;
        return $this->db->query($query)->row();
    }

    public function getDepartmentByKelompok($kelompok){
        $query="select distinct department from internship where id_kelompok =".$kelompok;
        return $this->db->query($query)->row();
    }
    
    public function getInstitutionByKelompok($kelompok){
        $query="select distinct institute from internship where id_kelompok =".$kelompok;
        return $this->db->query($query)->row();
    }
    
    public function getProgramStuyByKelompok($kelompok){
        $query="select distinct studyProgram from internship where id_kelompok =".$kelompok;
        return $this->db->query($query)->row();
    }

    public function getFakultasByKelompok($kelompok){
        $query="select distinct faculty from internship where id_kelompok =".$kelompok;
        return $this->db->query($query)->row();
    }

    public function insertNewInternship( $data){
        print_r($data);        
        return $this->db->insert_batch('internship',$data);        

    }

    public function getNIMByKelompok($kelompok=null){
        $query="select id from internship where id_kelompok =".$kelompok;
        return $this->db->query($query)->result();
    }

    public function updateByNIM($data){
        return $this->db->update_batch('internship',$data,'id');        
    }


}
