<?php
$pg = isset($_GET['page']) ? $_GET['page'] : '' ;
switch ($pg) {
  //case sign_out
  case 'sign-out' :
    if(!file_exists ("../cpanel/sign_out.php"))die("File sign out tidak tersedia.");
    include ("../cpanel/sign_out.php");
    break;

  //case dashboard
  case 'dashboard' :
    if(!file_exists ("../cpanel/dashboard.php"))die("File dashboard tidak tersedia.");
    include ("../cpanel/dashboard.php");
    break;

    //====================================Bagian Untuk kelas==========================================//
    //-- tampil kelas --//
    case 'vwKl' :
      if(!file_exists ("../cpanel/pages/kelas/kelas_view.php"))die("File tampil pengguna tidak tersedia.");
      include ("../cpanel/pages/kelas/kelas_view.php");
      break;

    //-- tampil kelas --//
    case 'import' :
      if(!file_exists ("../cpanel/pages/nilai/importbaru/form.php"))die("File tampil pengguna tidak tersedia.");
      include ("../cpanel/pages/nilai/importbaru/form.php");
      break;

    //-- tampil kelas guru --//
    case 'vwKlGr' :
      if(!file_exists ("../cpanel/pages/kelas/kelas_view_detail.php"))die("File tampil pengguna tidak tersedia.");
      include ("../cpanel/pages/kelas/kelas_view_detail.php");
      break;

    //-- tampil kelas wali --//
    case 'vwKlWl' :
      if(!file_exists ("../cpanel/pages/kelas/kelas_view_wali.php"))die("File tampil pengguna tidak tersedia.");
      include ("../cpanel/pages/kelas/kelas_view_wali.php");
      break;


    //-- tampil kelas siswa --//
    case 'vwKlSs' :
      if(!file_exists ("../cpanel/pages/kelas/detail_kelas_siswa.php"))die("File tampil pengguna tidak tersedia.");
      include ("../cpanel/pages/kelas/detail_kelas_siswa.php");
      break;

    //-- tambah kelas mapel --//
    case 'adKlsv' :
      if(!file_exists ("../cpanel/pages/kelas/kelas_new_mapel.php"))die("File tambah pengguna tidak tersedia.");
      include ("../cpanel/pages/kelas/kelas_new_mapel.php");
      break;
      //-- edit kelas mapel --//
      case 'edKlsv' :
        if(!file_exists ("../cpanel/pages/kelas/kelas_edit_mapel.php"))die("File tambah pengguna tidak tersedia.");
        include ("../cpanel/pages/kelas/kelas_edit_mapel.php");
        break;
        //-- update kelas mapel --//
        case 'upKlsv' :
          if(!file_exists ("../cpanel/pages/kelas/kelas_update_mapel.php"))die("File tambah pengguna tidak tersedia.");
          include ("../cpanel/pages/kelas/kelas_update_mapel.php");
          break;
          //-- hapus kelas mapel --//
          case 'dlKlsv' :
            if(!file_exists ("../cpanel/pages/kelas/kelas_del_mapel.php"))die("File tambah pengguna tidak tersedia.");
            include ("../cpanel/pages/kelas/kelas_del_mapel.php");
            break;


    //-- simpan kelas mapel --//
      case 'svKlMp' :
        if(!file_exists ("../cpanel/pages/kelas/kelas_save_mapel.php"))die("File tambah pengguna tidak tersedia.");
        include ("../cpanel/pages/kelas/kelas_save_mapel.php");
        break;

    //-- tambah kelas --//
    case 'adKl' :
      if(!file_exists ("../cpanel/pages/kelas/kelas_new.php"))die("File tambah pengguna tidak tersedia.");
      include ("../cpanel/pages/kelas/kelas_new.php");
      break;

    //-- simpan kelas/tambah aksi --//
    case 'svKl' :
      if(!file_exists ("../cpanel/pages/kelas/kelas_save.php"))die("File simpan pengguna tidak tersedia.");
      include ("../cpanel/pages/kelas/kelas_save.php");
      break;

    //-- edit kelas --//
    case 'edKl' :
      if(!file_exists ("../cpanel/pages/kelas/kelas_edit.php"))die("File edit pengguna tidak tersedia.");
      include ("../cpanel/pages/kelas/kelas_edit.php");
      break;

    //-- update kelas/edit aksi --//
    case 'upKl' :
      if(!file_exists ("../cpanel/pages/kelas/kelas_update.php"))die("File update pengguna tidak tersedia.");
      include ("../cpanel/pages/kelas/kelas_update.php");
      break;

    //-- hapus kelas --//
    case 'dlKl' :
      if(!file_exists ("../cpanel/pages/kelas/kelas_del.php"))die("File hapus pengguna tidak tersedia.");
      include ("../cpanel/pages/kelas/kelas_del.php");
      break;

      //-- lihat kelas detail--//
    case 'detailKl' :
        if(!file_exists ("../cpanel/pages/kelas/detail_kelas.php"))die("File hapus pengguna tidak tersedia.");
        include ("../cpanel/pages/kelas/detail_kelas.php");
        break;

      //-- lihat kelas detail guru--//
      case 'detailKlGr' :
          if(!file_exists ("../cpanel/pages/kelas/detail_kelas_guru.php"))die("File hapus pengguna tidak tersedia.");
          include ("../cpanel/pages/kelas/detail_kelas_guru.php");
          break;
          //-- lihat kelas wali--//
      case 'detailKlWl' :
        if(!file_exists ("../cpanel/pages/kelas/detail_kelas_wali.php"))die("File hapus pengguna tidak tersedia.");
        include ("../cpanel/pages/kelas/detail_kelas_wali.php");
        break;

    //====================================Bagian Untuk Admin==========================================//
      //lihat profile admin
    case 'profileUsr' :
      if(!file_exists ("../cpanel/pages/admin/profile_admin.php"))die("File Profile tidak tersedia.");
      include ("../cpanel/pages/admin/profile_admin.php");
      break;

    //edit profile
    case 'edt_profUsr' :
      if(!file_exists ("../cpanel/pages/admin/profile_edit.php"))die("File Profile tidak tersedia.");
      include ("../cpanel/pages/admin/profile_edit.php");
      break;

      //update profile
      case 'upProfUsr' :
        if(!file_exists ("../cpanel/pages/admin/profile_update.php"))die("File Profile tidak tersedia.");
        include ("../cpanel/pages/admin/profile_update.php");
        break;

    //-- tampil admin --//
    case 'vwUs' :
    	if(!file_exists ("../cpanel/pages/admin/admin_view.php"))die("File tampil pengguna tidak tersedia.");
    	include ("../cpanel/pages/admin/admin_view.php");
    	break;

    //-- tambah admin --//
    case 'adUs' :
    	if(!file_exists ("../cpanel/pages/admin/admin_new.php"))die("File tambah pengguna tidak tersedia.");
        	include ("../cpanel/pages/admin/admin_new.php");
        	break;

    //-- simpan admin/tambah aksi --//
    case 'svUs' :
    	if(!file_exists ("../cpanel/pages/admin/admin_save.php"))die("File simpan pengguna tidak tersedia.");
    	include ("../cpanel/pages/admin/admin_save.php");
    	break;

    //-- edit admin --//
    case 'edUs' :
    	if(!file_exists ("../cpanel/pages/admin/admin_edit.php"))die("File edit pengguna tidak tersedia.");
        	include ("../cpanel/pages/admin/admin_edit.php");
        	break;

    //-- update admin/edit aksi --//
    case 'upUs' :
    	if(!file_exists ("../cpanel/pages/admin/admin_update.php"))die("File update pengguna tidak tersedia.");
    	include ("../cpanel/pages/admin/admin_update.php");
    	break;

    //-- hapus admin --//
    case 'dlUs' :
    	if(!file_exists ("../cpanel/pages/admin/admin_del.php"))die("File hapus pengguna tidak tersedia.");
    	include ("../cpanel/pages/admin/admin_del.php");
    	break;


    //====================================Bagian Untuk Guru==========================================//
    //lihat profile Guru
    case 'profileGr' :
      if(!file_exists ("../cpanel/pages/guru/profile_guru.php"))die("File Profile tidak tersedia.");
      include ("../cpanel/pages/guru/profile_guru.php");
      break;

          //edit profile
    case 'edt_profGru' :
      if(!file_exists ("../cpanel/pages/guru/profile_edit.php"))die("File Profile tidak tersedia.");
      include ("../cpanel/pages/guru/profile_edit.php");
      break;

    //edit aksi profile
    case 'upProfGru' :
      if(!file_exists ("../cpanel/pages/guru/profile_update.php"))die("File update guru tidak tersedia.");
      include ("../cpanel/pages/guru/profile_update.php");
      break;

    //-- tampil guru --//
    case 'vwGr' :
      if(!file_exists ("../cpanel/pages/guru/guru_view.php"))die("File tampil guru tidak tersedia.");
      include ("../cpanel/pages/guru/guru_view.php");
      break;

    //-- tambah guru --//
    case 'adGr' :
      if(!file_exists ("../cpanel/pages/guru/guru_new.php"))die("File tambah guru tidak tersedia.");
      include ("../cpanel/pages/guru/guru_new.php");
      break;

    //-- simpan guru/tambah aksi --//
    case 'svGr' :
      if(!file_exists ("../cpanel/pages/guru/guru_save.php"))die("File simpan guru tidak tersedia.");
      include ("../cpanel/pages/guru/guru_save.php");
      break;

    //-- edit guru --//
    case 'edGr' :
      if(!file_exists ("../cpanel/pages/guru/guru_edit.php"))die("File edit guru tidak tersedia.");
      include ("../cpanel/pages/guru/guru_edit.php");
      break;

    //-- update guru/edit aksi --//
    case 'upGr' :
      if(!file_exists ("../cpanel/pages/guru/guru_update.php"))die("File update guru tidak tersedia.");
      include ("../cpanel/pages/guru/guru_update.php");
      break;

    //-- hapus guru --//
    case 'dlGr' :
      if(!file_exists ("../cpanel/pages/guru/guru_del.php"))die("File hapus guru tidak tersedia.");
      include ("../cpanel/pages/guru/guru_del.php");
      break;


    //====================================Bagian Untuk siswa==========================================//
  //lihat profile siswa
  case 'profileSv' :
    if(!file_exists ("../cpanel/pages/siswa/profile_siswa.php"))die("File Profile tidak tersedia.");
    include ("../cpanel/pages/siswa/profile_siswa.php");
    break;

  //edit profile
  case 'edt_profSv' :
    if(!file_exists ("../cpanel/pages/siswa/profile_edit.php"))die("File Profile tidak tersedia.");
    include ("../cpanel/pages/siswa/profile_edit.php");
    break;

  //edit aksi profile
  case 'upProfSv' :
  if(!file_exists ("../cpanel/pages/siswa/profile_update.php"))die("File update siswa tidak tersedia.");
    include ("../cpanel/pages/siswa/profile_update.php");
    break;

  //-- tampil siswa --//
  case 'vwSs' :
    if(!file_exists ("../cpanel/pages/siswa/siswa_view.php"))die("File tampil siswa tidak tersedia.");
    include ("../cpanel/pages/siswa/siswa_view.php");
    break;

  //-- tambah siswa --//
  case 'adSs' :
    if(!file_exists ("../cpanel/pages/siswa/siswa_new.php"))die("File tambah siswa tidak tersedia.");
    include ("../cpanel/pages/siswa/siswa_new.php");
    break;

  //-- simpan siswa/tambah aksi --//
  case 'svSs' :
    if(!file_exists ("../cpanel/pages/siswa/siswa_save.php"))die("File simpan siswa tidak tersedia.");
    include ("../cpanel/pages/siswa/siswa_save.php");
    break;

  //-- edit siswa --//
  case 'edSs' :
    if(!file_exists ("../cpanel/pages/siswa/siswa_edit.php"))die("File edit siswa tidak tersedia.");
    include ("../cpanel/pages/siswa/siswa_edit.php");
    break;

  //-- update siswa/edit aksi --//
    case 'upSs' :
    if(!file_exists ("../cpanel/pages/siswa/siswa_update.php"))die("File update siswa tidak tersedia.");
    include ("../cpanel/pages/siswa/siswa_update.php");
    break;

  //-- hapus siswa --//
    case 'dlSs' :
    if(!file_exists ("../cpanel/pages/siswa/siswa_del.php"))die("File hapus siswa tidak tersedia.");
    include ("../cpanel/pages/siswa/siswa_del.php");
    break;

    //====================================Bagian Untuk mapel==========================================//


    //-- tampil mapel --//
    case 'vwMp' :
      if(!file_exists ("../cpanel/pages/mapel/mapel_view.php"))die("File tampil pengguna tidak tersedia.");
      include ("../cpanel/pages/mapel/mapel_view.php");
      break;

    //-- tambah mapel --//
    case 'adMp' :
      if(!file_exists ("../cpanel/pages/mapel/mapel_new.php"))die("File tambah pengguna tidak tersedia.");
      include ("../cpanel/pages/mapel/mapel_new.php");
      break;

    //-- simpan mapel/tambah aksi --//
    case 'svMp' :
      if(!file_exists ("../cpanel/pages/mapel/mapel_save.php"))die("File simpan pengguna tidak tersedia.");
      include ("../cpanel/pages/mapel/mapel_save.php");
      break;

    //-- edit mapel --//
    case 'edMp' :
      if(!file_exists ("../cpanel/pages/mapel/mapel_edit.php"))die("File edit pengguna tidak tersedia.");
      include ("../cpanel/pages/mapel/mapel_edit.php");
      break;

    //-- update mapel/edit aksi --//
    case 'upMp' :
      if(!file_exists ("../cpanel/pages/mapel/mapel_update.php"))die("File update pengguna tidak tersedia.");
      include ("../cpanel/pages/mapel/mapel_update.php");
      break;

    //-- hapus mapel --//
    case 'dlMp' :
      if(!file_exists ("../cpanel/pages/mapel/mapel_del.php"))die("File hapus pengguna tidak tersedia.");
      include ("../cpanel/pages/mapel/mapel_del.php");
      break;


  //====================================Bagian Untuk tahun==========================================//


          //-- tampil tahun --//
          case 'vwTh' :
            if(!file_exists ("../cpanel/pages/tahun/tahun_view.php"))die("File tampil pengguna tidak tersedia.");
            include ("../cpanel/pages/tahun/tahun_view.php");
            break;

          //-- tambah tahun --//
          case 'adTh' :
            if(!file_exists ("../cpanel/pages/tahun/tahun_new.php"))die("File tambah pengguna tidak tersedia.");
            include ("../cpanel/pages/tahun/tahun_new.php");
            break;

          //-- simpan tahun/tambah aksi --//
          case 'svTh' :
            if(!file_exists ("../cpanel/pages/tahun/tahun_save.php"))die("File siThan pengguna tidak tersedia.");
            include ("../cpanel/pages/tahun/tahun_save.php");
            break;

          //-- edit tahun --//
          case 'edTh' :
            if(!file_exists ("../cpanel/pages/tahun/tahun_edit.php"))die("File edit pengguna tidak tersedia.");
            include ("../cpanel/pages/tahun/tahun_edit.php");
            break;

          //-- update tahun/edit aksi --//
          case 'upTh' :
            if(!file_exists ("../cpanel/pages/tahun/tahun_update.php"))die("File update pengguna tidak tersedia.");
            include ("../cpanel/pages/tahun/tahun_update.php");
            break;

          //-- hapus tahun --//
          case 'dlTh' :
            if(!file_exists ("../cpanel/pages/tahun/tahun_del.php"))die("File hapus pengguna tidak tersedia.");
            include ("../cpanel/pages/tahun/tahun_del.php");
            break;
      //====================================Bagian Untuk nilai==========================================//

      //-- tampil nilai admin--//
      case 'vwRpSw' :
        if(!file_exists ("../cpanel/pages/nilai/nilai_view_siswa.php"))die("File tampil pengguna tidak tersedia.");
        include ("../cpanel/pages/nilai/nilai_view_siswa.php");
        break;
        //-- tampil nilai admin--//
      case 'server' :
        if(!file_exists ("../cpanel/pages/nilai/server.php"))die("File tampil pengguna tidak tersedia.");
        include ("../cpanel/pages/nilai/server.php");
        break;

        //-- tampil nilai admin--//
        case 'ctNl' :
          if(!file_exists ("../cpanel/pages/nilai/pdf_nilai.php"))die("File tampil pengguna tidak tersedia.");
          include ("../cpanel/pages/nilai/pdf_nilai.php");
          break;


      //-- tampil nilai admin--//
      case 'vwRp' :
        if(!file_exists ("../cpanel/pages/nilai/nilai_view.php"))die("File tampil pengguna tidak tersedia.");
        include ("../cpanel/pages/nilai/nilai_view.php");
        break;

      //-- tambah nilai rapot sikap--//
      case 'adSk' :
        if(!file_exists ("../cpanel/pages/nilai/nilai_new_sikap.php"))die("File tambah pengguna tidak tersedia.");
        include ("../cpanel/pages/nilai/nilai_new_sikap.php");
        break;

      //-- simpan nilai rapot sikap --//
      case 'svSk' :
        if(!file_exists ("../cpanel/pages/nilai/nilai_save_sikap.php"))die("File simpan pengguna tidak tersedia.");
        include ("../cpanel/pages/nilai/nilai_save_sikap.php");
        break;

      //-- edit nilai rapot sikap --//
      case 'edSk' :
        if(!file_exists ("../cpanel/pages/nilai/nilai_edit_sikap.php"))die("File simpan pengguna tidak tersedia.");
        include ("../cpanel/pages/nilai/nilai_edit_sikap.php");
        break;

      //-- edit nilai rapot sikap --//
      case 'upSk' :
        if(!file_exists ("../cpanel/pages/nilai/nilai_update_sikap.php"))die("File simpan pengguna tidak tersedia.");
        include ("../cpanel/pages/nilai/nilai_update_sikap.php");
        break;

      //-- delete nilai rapot sikap --//
      case 'dlSk' :
        if(!file_exists ("../cpanel/pages/nilai/nilai_del_sikap.php"))die("File simpan pengguna tidak tersedia.");
        include ("../cpanel/pages/nilai/nilai_del_sikap.php");
        break;

        //-- tambah nilai rapot Ekstrakulikuler--//
        case 'adEk' :
          if(!file_exists ("../cpanel/pages/nilai/nilai_new_ekskul.php"))die("File tambah pengguna tidak tersedia.");
          include ("../cpanel/pages/nilai/nilai_new_ekskul.php");
          break;

        //-- simpan nilai rapot Ekstrakulikuler --//
        case 'svEk' :
          if(!file_exists ("../cpanel/pages/nilai/nilai_save_ekskul.php"))die("File simpan pengguna tidak tersedia.");
          include ("../cpanel/pages/nilai/nilai_save_ekskul.php");
          break;

        //-- edit nilai rapot Ekstrakulikuler --//
        case 'edEk' :
          if(!file_exists ("../cpanel/pages/nilai/nilai_edit_ekskul.php"))die("File simpan pengguna tidak tersedia.");
          include ("../cpanel/pages/nilai/nilai_edit_ekskul.php");
          break;

        //-- edit nilai rapot Ekstrakulikuler --//
        case 'upEk' :
          if(!file_exists ("../cpanel/pages/nilai/nilai_update_ekskul.php"))die("File simpan pengguna tidak tersedia.");
          include ("../cpanel/pages/nilai/nilai_update_ekskul.php");
          break;

        //-- delete nilai rapot Ekstrakulikuler --//
        case 'dlEk' :
          if(!file_exists ("../cpanel/pages/nilai/nilai_del_ekskul.php"))die("File simpan pengguna tidak tersedia.");
          include ("../cpanel/pages/nilai/nilai_del_ekskul.php");
          break;

          //-- tambah nilai rapot prestasi--//
          case 'adPr' :
            if(!file_exists ("../cpanel/pages/nilai/nilai_new_prestasi.php"))die("File tambah pengguna tidak tersedia.");
            include ("../cpanel/pages/nilai/nilai_new_prestasi.php");
            break;

          //-- simpan nilai rapot prestasi --//
          case 'svPr' :
            if(!file_exists ("../cpanel/pages/nilai/nilai_save_prestasi.php"))die("File simpan pengguna tidak tersedia.");
            include ("../cpanel/pages/nilai/nilai_save_prestasi.php");
            break;

          //-- edit nilai rapot prestasi --//
          case 'edPr' :
            if(!file_exists ("../cpanel/pages/nilai/nilai_edit_prestasi.php"))die("File simpan pengguna tidak tersedia.");
            include ("../cpanel/pages/nilai/nilai_edit_prestasi.php");
            break;

          //-- edit nilai rapot prestasi --//
          case 'upPr' :
            if(!file_exists ("../cpanel/pages/nilai/nilai_update_prestasi.php"))die("File simpan pengguna tidak tersedia.");
            include ("../cpanel/pages/nilai/nilai_update_prestasi.php");
            break;

          //-- delete nilai rapot prestasi --//
          case 'dlPr' :
            if(!file_exists ("../cpanel/pages/nilai/nilai_del_prestasi.php"))die("File simpan pengguna tidak tersedia.");
            include ("../cpanel/pages/nilai/nilai_del_prestasi.php");
            break;

            //-- tambah nilai rapot hadir--//
            case 'adHr' :
              if(!file_exists ("../cpanel/pages/nilai/nilai_new_hadir.php"))die("File tambah pengguna tidak tersedia.");
              include ("../cpanel/pages/nilai/nilai_new_hadir.php");
              break;

            //-- simpan nilai rapot hadir --//
            case 'svHr' :
              if(!file_exists ("../cpanel/pages/nilai/nilai_save_hadir.php"))die("File simpan pengguna tidak tersedia.");
              include ("../cpanel/pages/nilai/nilai_save_hadir.php");
              break;

            //-- edit nilai rapot hadir --//
            case 'edHr' :
              if(!file_exists ("../cpanel/pages/nilai/nilai_edit_hadir.php"))die("File simpan pengguna tidak tersedia.");
              include ("../cpanel/pages/nilai/nilai_edit_hadir.php");
              break;

            //-- edit nilai rapot hadir --//
            case 'upHr' :
              if(!file_exists ("../cpanel/pages/nilai/nilai_update_hadir.php"))die("File simpan pengguna tidak tersedia.");
              include ("../cpanel/pages/nilai/nilai_update_hadir.php");
              break;

            //-- delete nilai rapot hadir --//
            case 'dlHr' :
              if(!file_exists ("../cpanel/pages/nilai/nilai_del_hadir.php"))die("File simpan pengguna tidak tersedia.");
              include ("../cpanel/pages/nilai/nilai_del_hadir.php");
              break;


      //-- tambah nilai guru--//
      case 'adNl' :
        if(!file_exists ("../cpanel/pages/nilai/nilai_new_guru.php"))die("File tambah pengguna tidak tersedia.");
        include ("../cpanel/pages/nilai/nilai_new_guru.php");
        break;

      //-- simpan nilai guru --//
      case 'svNl' :
        if(!file_exists ("../cpanel/pages/nilai/nilai_save_guru.php"))die("File simpan pengguna tidak tersedia.");
        include ("../cpanel/pages/nilai/nilai_save_guru.php");
        break;

      //-- edit nilai guru--//
      case 'edRp' :
        if(!file_exists ("../cpanel/pages/nilai/nilai_edit.php"))die("File edit pengguna tidak tersedia.");
        include ("../cpanel/pages/nilai/nilai_edit.php");
        break;

      //-- update nilai guru --//
      case 'upRp' :
        if(!file_exists ("../cpanel/pages/nilai/nilai_update.php"))die("File update pengguna tidak tersedia.");
        include ("../cpanel/pages/nilai/nilai_update.php");
        break;

      //-- hapus nilai guru--//
      case 'dlRp' :
        if(!file_exists ("../cpanel/pages/nilai/nilai_del.php"))die("File hapus pengguna tidak tersedia.");
        include ("../cpanel/pages/nilai/nilai_del.php");
        break;

}
?>
