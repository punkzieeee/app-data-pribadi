package com.i2s.appdatapribadi.dto;

import java.io.Serializable;
import java.util.Date;

import lombok.Builder;
import lombok.Getter;
import lombok.Setter;

@Setter
@Getter
@Builder
public class DataDiriDto implements Serializable {
    private String nik;
    private String nama_lengkap;
    private String jenis_kelamin;
    private Date tgl_lahir;
    private String alamat;
    private String negara;
    private String uuid;
}
