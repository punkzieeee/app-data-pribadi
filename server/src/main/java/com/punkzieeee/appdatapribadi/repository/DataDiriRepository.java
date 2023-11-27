package com.punkzieeee.appdatapribadi.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.punkzieeee.appdatapribadi.entity.DataDiri;

@Repository
public interface DataDiriRepository extends JpaRepository<DataDiri, String>{
    List<DataDiri> findByNikOrNamaLengkap(String nik, String namaLengkap);
    List<DataDiri> findByNik(String nik);
    List<DataDiri> findByUuid(String uuid);
}
