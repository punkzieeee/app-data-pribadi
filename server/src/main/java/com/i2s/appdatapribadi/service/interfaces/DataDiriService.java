package com.i2s.appdatapribadi.service.interfaces;

import java.util.List;

import com.i2s.appdatapribadi.dto.CariDataDiriDto;
import com.i2s.appdatapribadi.dto.DataDiriDto;
import com.i2s.appdatapribadi.entity.DataDiri;

public interface DataDiriService {
    public List<DataDiriDto> getAll();
    public List<DataDiriDto> getSearch(CariDataDiriDto cariDataDiriDto);
    public DataDiri saveData(DataDiriDto inputDataDiriDto);
    public DataDiri updateData(DataDiriDto inputDataDiriDto, String uuid);
    public void deleteData(DataDiriDto inputDataDiriDto);
}
