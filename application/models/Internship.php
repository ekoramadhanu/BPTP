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
              dayStar as 'startDay',
                case  
                when monthStart = 1 then 'Januari'
                when monthStart = 2 then 'Februari'
                when monthStart = 3 then 'Maret'
                when monthStart = 4 then 'April'
                when monthStart = 5 then 'Mei'
                when monthStart = 6 then 'Juni'
                when monthStart = 7 then 'Juli'
                when monthStart = 8 then 'Agustus'
                when monthStart = 9 then 'September'
                when monthStart = 10 then 'Oktober'
                when monthStart = 11 then 'November'
                when monthStart = 12 then 'Desember'
                END as 'StartMonth',
                yearStart as 'satrtYear', dayEnd as 'endDay',
                case  
                when monthEnd = 1 then 'Januari'
                when monthEnd = 2 then 'Februari'
                when monthEnd = 3 then 'Maret'
                when monthEnd = 4 then 'April'
                when monthEnd = 5 then 'Mei'
                when monthEnd = 6 then 'Juni'
                when monthEnd = 7 then 'Juli'
                when monthEnd = 8 then 'Agustus'
                when monthEnd = 9 then 'September'
                when monthEnd = 10 then 'Oktober'
                when monthEnd = 11 then 'November'
                when monthEnd = 12 then 'Desember'
                END as 'endMonth',
                yearEnd as 'endYear', id_kelompok as 'kelompok',
                guide,place from internship where monthStart = ".$month.
                " order by yearStart,monthStart,dayStar";
        return $this->db->query($query)->result();
    }  
    
    public function getLimitAndOffset($limit,$offset,$year = null,$like = null){
        if($year&&$like){
            $query ="select DISTINCT institute,status,nomorSurat,
          dayStar as 'startDay',
            case  
            when monthStart = 1 then 'Januari'
            when monthStart = 2 then 'Februari'
            when monthStart = 3 then 'Maret'
            when monthStart = 4 then 'April'
            when monthStart = 5 then 'Mei'
            when monthStart = 6 then 'Juni'
            when monthStart = 7 then 'Juli'
            when monthStart = 8 then 'Agustus'
            when monthStart = 9 then 'September'
            when monthStart = 10 then 'Oktober'
            when monthStart = 11 then 'November'
            when monthStart = 12 then 'Desember'
            END as 'StartMonth',
            yearStart as 'satrtYear', dayEnd as 'endDay',
            case  
            when monthEnd = 1 then 'Januari'
            when monthEnd = 2 then 'Februari'
            when monthEnd = 3 then 'Maret'
            when monthEnd = 4 then 'April'
            when monthEnd = 5 then 'Mei'
            when monthEnd = 6 then 'Juni'
            when monthEnd = 7 then 'Juli'
            when monthEnd = 8 then 'Agustus'
            when monthEnd = 9 then 'September'
            when monthEnd = 10 then 'Oktober'
            when monthEnd = 11 then 'November'
            when monthEnd = 12 then 'Desember'
            END as 'endMonth',
            yearEnd as 'endYear', id_kelompok as 'kelompok',
            guide,place,create_at from internship where yearStart =".$year." and fullname like '%".$like."%' order by create_at desc, yearStart desc, monthStart asc
            limit ".$limit." offset ".$offset;
            return $this->db->query($query)->result();
        }else if($like){
            $query ="select DISTINCT institute,status,nomorSurat,
          dayStar as 'startDay',
            case  
            when monthStart = 1 then 'Januari'
            when monthStart = 2 then 'Februari'
            when monthStart = 3 then 'Maret'
            when monthStart = 4 then 'April'
            when monthStart = 5 then 'Mei'
            when monthStart = 6 then 'Juni'
            when monthStart = 7 then 'Juli'
            when monthStart = 8 then 'Agustus'
            when monthStart = 9 then 'September'
            when monthStart = 10 then 'Oktober'
            when monthStart = 11 then 'November'
            when monthStart = 12 then 'Desember'
            END as 'StartMonth',
            yearStart as 'satrtYear', dayEnd as 'endDay',
            case  
            when monthEnd = 1 then 'Januari'
            when monthEnd = 2 then 'Februari'
            when monthEnd = 3 then 'Maret'
            when monthEnd = 4 then 'April'
            when monthEnd = 5 then 'Mei'
            when monthEnd = 6 then 'Juni'
            when monthEnd = 7 then 'Juli'
            when monthEnd = 8 then 'Agustus'
            when monthEnd = 9 then 'September'
            when monthEnd = 10 then 'Oktober'
            when monthEnd = 11 then 'November'
            when monthEnd = 12 then 'Desember'
            END as 'endMonth',
            yearEnd as 'endYear', id_kelompok as 'kelompok',
            guide,place,create_at from internship where fullname like '%".$like."%' order by create_at desc,yearStart desc, monthStart asc
            limit ".$limit." offset ".$offset;
            return $this->db->query($query)->result();
        }else if($year){
            $query ="select DISTINCT institute,status,nomorSurat,
          dayStar as 'startDay',
            case  
            when monthStart = 1 then 'Januari'
            when monthStart = 2 then 'Februari'
            when monthStart = 3 then 'Maret'
            when monthStart = 4 then 'April'
            when monthStart = 5 then 'Mei'
            when monthStart = 6 then 'Juni'
            when monthStart = 7 then 'Juli'
            when monthStart = 8 then 'Agustus'
            when monthStart = 9 then 'September'
            when monthStart = 10 then 'Oktober'
            when monthStart = 11 then 'November'
            when monthStart = 12 then 'Desember'
            END as 'StartMonth',
            yearStart as 'satrtYear', dayEnd as 'endDay',
            case  
            when monthEnd = 1 then 'Januari'
            when monthEnd = 2 then 'Februari'
            when monthEnd = 3 then 'Maret'
            when monthEnd = 4 then 'April'
            when monthEnd = 5 then 'Mei'
            when monthEnd = 6 then 'Juni'
            when monthEnd = 7 then 'Juli'
            when monthEnd = 8 then 'Agustus'
            when monthEnd = 9 then 'September'
            when monthEnd = 10 then 'Oktober'
            when monthEnd = 11 then 'November'
            when monthEnd = 12 then 'Desember'
            END as 'endMonth',
            yearEnd as 'endYear', id_kelompok as 'kelompok',
            guide,place,create_at from internship where yearStart = ".$year." order by create_at desc,yearStart desc, monthStart asc
            limit ".$limit." offset ".$offset;
            return $this->db->query($query)->result();
        }else{
            $query ="select DISTINCT institute,status,nomorSurat,
              dayStar as 'startDay',
                case  
                when monthStart = 1 then 'Januari'
                when monthStart = 2 then 'Februari'
                when monthStart = 3 then 'Maret'
                when monthStart = 4 then 'April'
                when monthStart = 5 then 'Mei'
                when monthStart = 6 then 'Juni'
                when monthStart = 7 then 'Juli'
                when monthStart = 8 then 'Agustus'
                when monthStart = 9 then 'September'
                when monthStart = 10 then 'Oktober'
                when monthStart = 11 then 'November'
                when monthStart = 12 then 'Desember'
                END as 'StartMonth',
                yearStart as 'satrtYear', dayEnd as 'endDay',
                case  
                when monthEnd = 1 then 'Januari'
                when monthEnd = 2 then 'Februari'
                when monthEnd = 3 then 'Maret'
                when monthEnd = 4 then 'April'
                when monthEnd = 5 then 'Mei'
                when monthEnd = 6 then 'Juni'
                when monthEnd = 7 then 'Juli'
                when monthEnd = 8 then 'Agustus'
                when monthEnd = 9 then 'September'
                when monthEnd = 10 then 'Oktober'
                when monthEnd = 11 then 'November'
                when monthEnd = 12 then 'Desember'
                END as 'endMonth',
                yearEnd as 'endYear', id_kelompok as 'kelompok',
                guide,place,create_at from internship order by create_at desc,yearStart desc, monthStart asc
                limit ".$limit." offset ".$offset;
            return $this->db->query($query)->result();
        }
    }  

    public function getCountAll($year = null, $like = null){
        if($year&&$like){
            $query ="select DISTINCT institute,
              dayStar as 'startDay',
                case  
                when monthStart = 1 then 'Januari'
                when monthStart = 2 then 'Februari'
                when monthStart = 3 then 'Maret'
                when monthStart = 4 then 'April'
                when monthStart = 5 then 'Mei'
                when monthStart = 6 then 'Juni'
                when monthStart = 7 then 'Juli'
                when monthStart = 8 then 'Agustus'
                when monthStart = 9 then 'September'
                when monthStart = 10 then 'Oktober'
                when monthStart = 11 then 'November'
                when monthStart = 12 then 'Desember'
                END as 'StartMonth',
                yearStart as 'satrtYear', dayEnd as 'endDay',
                case  
                when monthEnd = 1 then 'Januari'
                when monthEnd = 2 then 'Februari'
                when monthEnd = 3 then 'Maret'
                when monthEnd = 4 then 'April'
                when monthEnd = 5 then 'Mei'
                when monthEnd = 6 then 'Juni'
                when monthEnd = 7 then 'Juli'
                when monthEnd = 8 then 'Agustus'
                when monthEnd = 9 then 'September'
                when monthEnd = 10 then 'Oktober'
                when monthEnd = 11 then 'November'
                when monthEnd = 12 then 'Desember'
                END as 'endMonth',
                yearEnd as 'endYear', id_kelompok as 'kelompok',
                guide,place from internship where yearStart = ".$year." and fullname like '%".$like."%'";
            return $this->db->query($query)->num_rows();
        }else if($like){
            $query ="select DISTINCT institute,
              dayStar as 'startDay',
                case  
                when monthStart = 1 then 'Januari'
                when monthStart = 2 then 'Februari'
                when monthStart = 3 then 'Maret'
                when monthStart = 4 then 'April'
                when monthStart = 5 then 'Mei'
                when monthStart = 6 then 'Juni'
                when monthStart = 7 then 'Juli'
                when monthStart = 8 then 'Agustus'
                when monthStart = 9 then 'September'
                when monthStart = 10 then 'Oktober'
                when monthStart = 11 then 'November'
                when monthStart = 12 then 'Desember'
                END as 'StartMonth',
                yearStart as 'satrtYear', dayEnd as 'endDay',
                case  
                when monthEnd = 1 then 'Januari'
                when monthEnd = 2 then 'Februari'
                when monthEnd = 3 then 'Maret'
                when monthEnd = 4 then 'April'
                when monthEnd = 5 then 'Mei'
                when monthEnd = 6 then 'Juni'
                when monthEnd = 7 then 'Juli'
                when monthEnd = 8 then 'Agustus'
                when monthEnd = 9 then 'September'
                when monthEnd = 10 then 'Oktober'
                when monthEnd = 11 then 'November'
                when monthEnd = 12 then 'Desember'
                END as 'endMonth',
                yearEnd as 'endYear', id_kelompok as 'kelompok',
                guide,place from internship where fullname like '%".$like."%'";
            return $this->db->query($query)->num_rows();
        }else if($year){
            $query ="select DISTINCT institute,
              dayStar as 'startDay',
                case  
                when monthStart = 1 then 'Januari'
                when monthStart = 2 then 'Februari'
                when monthStart = 3 then 'Maret'
                when monthStart = 4 then 'April'
                when monthStart = 5 then 'Mei'
                when monthStart = 6 then 'Juni'
                when monthStart = 7 then 'Juli'
                when monthStart = 8 then 'Agustus'
                when monthStart = 9 then 'September'
                when monthStart = 10 then 'Oktober'
                when monthStart = 11 then 'November'
                when monthStart = 12 then 'Desember'
                END as 'StartMonth',
                yearStart as 'satrtYear', dayEnd as 'endDay',
                case  
                when monthEnd = 1 then 'Januari'
                when monthEnd = 2 then 'Februari'
                when monthEnd = 3 then 'Maret'
                when monthEnd = 4 then 'April'
                when monthEnd = 5 then 'Mei'
                when monthEnd = 6 then 'Juni'
                when monthEnd = 7 then 'Juli'
                when monthEnd = 8 then 'Agustus'
                when monthEnd = 9 then 'September'
                when monthEnd = 10 then 'Oktober'
                when monthEnd = 11 then 'November'
                when monthEnd = 12 then 'Desember'
                END as 'endMonth',
                yearEnd as 'endYear', id_kelompok as 'kelompok',
                guide,place from internship where yearStart = ".$year;
            return $this->db->query($query)->num_rows();
        }else{
            $query ="select DISTINCT institute,
              dayStar as 'startDay',
                case  
                when monthStart = 1 then 'Januari'
                when monthStart = 2 then 'Februari'
                when monthStart = 3 then 'Maret'
                when monthStart = 4 then 'April'
                when monthStart = 5 then 'Mei'
                when monthStart = 6 then 'Juni'
                when monthStart = 7 then 'Juli'
                when monthStart = 8 then 'Agustus'
                when monthStart = 9 then 'September'
                when monthStart = 10 then 'Oktober'
                when monthStart = 11 then 'November'
                when monthStart = 12 then 'Desember'
                END as 'StartMonth',
                yearStart as 'satrtYear', dayEnd as 'endDay',
                case  
                when monthEnd = 1 then 'Januari'
                when monthEnd = 2 then 'Februari'
                when monthEnd = 3 then 'Maret'
                when monthEnd = 4 then 'April'
                when monthEnd = 5 then 'Mei'
                when monthEnd = 6 then 'Juni'
                when monthEnd = 7 then 'Juli'
                when monthEnd = 8 then 'Agustus'
                when monthEnd = 9 then 'September'
                when monthEnd = 10 then 'Oktober'
                when monthEnd = 11 then 'November'
                when monthEnd = 12 then 'Desember'
                END as 'endMonth',
                yearEnd as 'endYear', id_kelompok as 'kelompok',
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
    public function getCountAllByYear($yearNow){
        return $this->db->get_where("internship",['yearStart'=>$yearNow])->num_rows();
    }

    public function getCountAllByEndYear($yearNow){    
        $yearPrev = $yearNow-1;
        return $this->db->get_where("internship",['yearStart'=>$yearPrev,'yearEnd'=>$yearNow])->num_rows();
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
        $query ="select distinct id_kelompok as 'kelompok',institute, nomorSurat,
      dayStar as 'startDay',monthStart as 'StartMonth',yearStart as 'satrtYear', 
        dayEnd as 'endDay',monthEnd as 'endMonth',yearEnd as 'endYear',place,guide 
        from internship where status = 'terdaftar' and monthStart = ".$month." and yearStart = ".$year 
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
        $query ="select id from internship where status = 'terdaftar'and monthStart = ".$month." and yearStart=".$year;
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
    public function getCountByEndDatePKL($monthCheck,$yearNow,$yearCheck=null,$monthNow=null){        
        if(!$yearCheck){
            $query="select id from internship 
            where status='terdaftar' and monthEnd >=".$monthCheck." and yearEnd= ".$yearNow.
            " and monthStart =".$monthNow." and yearStart= ".$yearNow;
            return $this->db->query($query)->num_rows();        
        }else if($yearNow < $yearCheck){
            $query="select id from internship where status ='terdaftar' and yearStart= ".$yearNow." 
             and monthStart <".$monthCheck." and yearEnd= ".$yearCheck;
             return $this->db->query($query)->num_rows();        
        }else{            
            $query="select id from internship where status ='terdaftar' and yearStart= ".$yearCheck." 
             and monthEnd >=".$monthCheck." and yearEnd= ".$yearNow;
             return $this->db->query($query)->num_rows();   
        }
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
        $query ="select department, dayStar as 'startDay',
        case  
        when monthStart = 1 then 'Januari'
        when monthStart = 2 then 'Februari'
        when monthStart = 3 then 'Maret'
        when monthStart = 4 then 'April'
        when monthStart = 5 then 'Mei'
        when monthStart = 6 then 'Juni'
        when monthStart = 7 then 'Juli'
        when monthStart = 8 then 'Agustus'
        when monthStart = 9 then 'September'
        when monthStart = 10 then 'Oktober'
        when monthStart = 11 then 'November'
        when monthStart = 12 then 'Desember'
        END as 'StartMonth',
        yearStart as 'satrtYear', dayEnd as 'endDay',
        case  
        when monthEnd = 1 then 'Januari'
        when monthEnd = 2 then 'Februari'
        when monthEnd = 3 then 'Maret'
        when monthEnd = 4 then 'April'
        when monthEnd = 5 then 'Mei' 
        when monthEnd = 6 then 'Juni'
        when monthEnd = 7 then 'Juli'
        when monthEnd = 8 then 'Agustus'
        when monthEnd = 9 then 'September'
        when monthEnd = 10 then 'Oktober'
        when monthEnd = 11 then 'November'
        when monthEnd = 12 then 'Desember'
        END as 'endMonth',guide,place,
        yearEnd as 'endYear' from internship where id_kelompok= ".$kelompok;
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
    public function getRekapByEndDatePKL($monthCheck,$yearNow,$yearCheck=null,$monthNow=null){        
        if(!$yearCheck){
            $query="select distinct id_kelompok as 'kelompok',institute, nomorSurat,
          dayStar as 'startDay',monthStart as 'StartMonth',yearStart as 'satrtYear', 
            dayEnd as 'endDay',monthEnd as 'endMonth',yearEnd as 'endYear',place,guide 
            from internship where status='terdaftar' and monthEnd >=".$monthCheck." and yearEnd= ".$yearNow.
            " and monthStart =".$monthNow." and yearStart= ".$yearNow;
            return $this->db->query($query)->result();        
        }else if($yearNow < $yearCheck){
            $query="select distinct id_kelompok as 'kelompok',institute, nomorSurat,
          dayStar as 'startDay',monthStart as 'StartMonth',yearStart as 'satrtYear',
             dayEnd as 'endDay',monthEnd as 'endMonth',yearEnd as 'endYear',place,guide 
             from internship where status ='terdaftar' and yearStart= ".$yearNow." 
             and monthStart <".$monthCheck." and yearEnd= ".$yearCheck;
             return $this->db->query($query)->result();        
        }else{            
            $query="select distinct id_kelompok as 'kelompok',institute, nomorSurat,
          dayStar as 'startDay',monthStart as 'StartMonth',yearStart as 'satrtYear',
             dayEnd as 'endDay',monthEnd as 'endMonth',yearEnd as 'endYear',place,guide 
             from internship where status ='terdaftar' and yearStart= ".$yearCheck." 
             and monthEnd >=".$monthCheck." and yearEnd= ".$yearNow;
             return $this->db->query($query)->result();   
        }
    }


    public function getCountByStatusAndStartYear($status,$yearNow){        
        $query="select id as 'jumlah'  from internship WHERE lower(status) ='".$status."' and yearStart =".$yearNow; 
        return $this->db->query($query)->num_rows();
    }

    public function getCountByStatusAndEndYear($status,$yearNow){  
        $yearPrev = $yearNow-1;      
        $query="select id as 'jumlah'  from internship WHERE lower(status) ='".$status."' and yearStart =".$yearPrev." and yearEnd=".$yearNow; 
        return $this->db->query($query)->num_rows();
    }

    public function getCountByGenderAndStartYear($gender,$yearNow){
        $query="select id as 'jumlah' from internship where gender= '".$gender."' and yearStart = ".$yearNow;
        return $this->db->query($query)->num_rows();
    }
    
    public function getCountByGenderAndEndYear($gender,$yearNow){
        $yearPrev = $yearNow-1;
        $query="select id as 'jumlah' from internship where gender= '".$gender."' and yearEnd = ".$yearNow." and yearStart =".$yearPrev;
        return $this->db->query($query)->num_rows();
    }
    public function getDepartmentByKelompok($kelompok){
        $query="select distinct department from internship where id_kelompok =".$kelompok;
        return $this->db->query($query)->row();
    }
    
    public function getInstitutionByKelompok($kelompok){
        $query="select distinct institute from internship where id_kelompok =".$kelompok;
        return $this->db->query($query)->row();
    }
    
    public function getProgramStudyByKelompok($kelompok){
        $query="select distinct studyProgram from internship where id_kelompok =".$kelompok;
        return $this->db->query($query)->row();
    }

    public function getFakultasByKelompok($kelompok){
        $query="select distinct faculty from internship where id_kelompok =".$kelompok;
        return $this->db->query($query)->row();
    }

    public function insertNewInternship( $data){
        // print_r($data);        
        return $this->db->insert_batch('internship',$data);        

    }

    public function getNIMByKelompok($kelompok=null){
        $query="select id from internship where id_kelompok =".$kelompok;
        return $this->db->query($query)->result();
    }

    public function updateByNIM($data){
        return $this->db->update_batch('internship',$data,'id');        
    }

    public function updateIdKelompok($kelompok){
        return $this->db->update('internship',['id_kelompok'=>null],['id'=>$kelompok]);
    }

    public function DeleteMemberKelompok($kelompok){
        return $this->db->delete('internship', array('id_kelompok' => $kelompok));
    }

    public function DeleteLeaderKelompok($kelompok){
        return $this->db->delete('internship', array('id' => $kelompok));
    }

    public function getRekapStartDateByIsSekolah($isSekolah,$month,$year){
        $query ="select id from internship where status = 'terdaftar' and is_sekolah = ".$isSekolah." and monthStart = ".$month." and yearStart=".$year;
        return $this->db->query($query)->num_rows();
    }

    public function getRekapEndtDateByIsSekolah($isSekolah,$monthCheck,$yearNow,$yearCheck=null,$monthNow=null){
        if(!$yearCheck){
            $query="select id from internship 
            where status='terdaftar' and is_sekolah = ".$isSekolah. " and monthEnd >=".$monthCheck." and yearEnd= ".$yearNow.
            " and monthStart =".$monthNow." and yearStart= ".$yearNow;
            return $this->db->query($query)->num_rows();        
        }else if($yearNow < $yearCheck){
            $query="select id from internship where status ='terdaftar' and is_sekolah = ".$isSekolah. " and yearStart= ".$yearNow." 
             and monthStart <".$monthCheck." and yearEnd= ".$yearCheck;
             return $this->db->query($query)->num_rows();        
        }else{            
            $query="select id from internship where status ='terdaftar' and is_sekolah = ".$isSekolah. " and yearStart= ".$yearCheck." 
             and monthEnd >=".$monthCheck." and yearEnd= ".$yearNow;
             return $this->db->query($query)->num_rows();   
        }        
    }

    public function updateNomorSuratByIdKelompok($data,$id_kelompok){
        return $this->db->update('internship',['nomorSurat'=>$data],['id_kelompok'=>$id_kelompok]);        
    }


}
