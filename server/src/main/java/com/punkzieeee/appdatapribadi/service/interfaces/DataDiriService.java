package com.punkzieeee.appdatapribadi.service.interfaces;

import java.util.List;

import com.punkzieeee.appdatapribadi.dto.CariDataDiriDto;
import com.punkzieeee.appdatapribadi.dto.DataDiriDto;
import com.punkzieeee.appdatapribadi.entity.DataDiri;

public interface DataDiriService {
    public List<DataDiriDto> getAll();
    public List<DataDiriDto> getSearch(CariDataDiriDto cariDataDiriDto);
    public DataDiri saveData(DataDiriDto inputDataDiriDto);
    public DataDiri updateData(DataDiriDto inputDataDiriDto, String uuid);
    public void deleteData(DataDiriDto inputDataDiriDto);
}
