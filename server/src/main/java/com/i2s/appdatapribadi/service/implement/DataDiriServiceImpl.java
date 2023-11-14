package com.i2s.appdatapribadi.service.implement;

import java.util.ArrayList;
import java.util.List;
import java.util.ListIterator;
import java.util.UUID;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.i2s.appdatapribadi.dto.CariDataDiriDto;
import com.i2s.appdatapribadi.dto.DataDiriDto;
import com.i2s.appdatapribadi.entity.DataDiri;
import com.i2s.appdatapribadi.repository.DataDiriRepository;
import com.i2s.appdatapribadi.service.interfaces.DataDiriService;

@Service
public class DataDiriServiceImpl implements DataDiriService {
    @Autowired
    DataDiriRepository dataDiriRepository;

    @Override
    public List<DataDiriDto> getAll() {
        ListIterator<DataDiri> it = dataDiriRepository.findAll().listIterator();
        List<DataDiriDto> list = new ArrayList<>();

        while (it.hasNext()) {
            DataDiri temp = it.next();
            DataDiriDto dto = DataDiriDto.builder()
                    .nik(temp.getNik())
                    .nama_lengkap(temp.getNamaLengkap())
                    .tgl_lahir(temp.getTglLahir())
                    .jenis_kelamin(temp.getJenisKelamin())
                    .alamat(temp.getAlamat())
                    .negara(temp.getNegara())
                    .build();
            list.add(dto);
        }

        return list;
    }

    @Override
    public List<DataDiriDto> getSearch(CariDataDiriDto cariDataDiriDto) {
        ListIterator<DataDiri> it = dataDiriRepository
                .findByNikOrNamaLengkap(cariDataDiriDto.getNik(), cariDataDiriDto.getNama_lengkap()).listIterator();
        List<DataDiriDto> list = new ArrayList<>();

        while (it.hasNext()) {
            DataDiri temp = it.next();
            DataDiriDto dto = DataDiriDto.builder()
                    .nik(temp.getNik())
                    .nama_lengkap(temp.getNamaLengkap())
                    .tgl_lahir(temp.getTglLahir())
                    .jenis_kelamin(temp.getJenisKelamin())
                    .alamat(temp.getAlamat())
                    .negara(temp.getNegara())
                    .build();
            list.add(dto);
        }

        return list;
    }

    @Override
    public DataDiri saveData(DataDiriDto dataDiriDto) {
        String uuid = UUID.randomUUID().toString();
        DataDiri data = DataDiri.builder()
                .nik(dataDiriDto.getNik())
                .namaLengkap(dataDiriDto.getNama_lengkap())
                .jenisKelamin(dataDiriDto.getJenis_kelamin())
                .tglLahir(dataDiriDto.getTgl_lahir())
                .alamat(dataDiriDto.getAlamat())
                .negara(dataDiriDto.getNegara())
                .uuid(uuid)
                .build();

        dataDiriRepository.save(data);
        return data;
    }

    @Override
    public DataDiri updateData(DataDiriDto dataDiriDto, String uuid) {
        DataDiri data = dataDiriRepository.findByUuid(uuid).get(0);
        data.setNik(dataDiriDto.getNik());
        data.setNamaLengkap(dataDiriDto.getNama_lengkap());
        data.setJenisKelamin(dataDiriDto.getJenis_kelamin());
        data.setTglLahir(dataDiriDto.getTgl_lahir());
        data.setAlamat(dataDiriDto.getAlamat());
        data.setNegara(dataDiriDto.getNegara());

        dataDiriRepository.save(data);
        return data;
    }

    @Override
    public void deleteData(DataDiriDto dataDiriDto) {
        DataDiri data = dataDiriRepository.findByNik(dataDiriDto.getNik()).get(0);
        dataDiriRepository.delete(data);
    }
}
