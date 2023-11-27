package com.punkzieeee.appdatapribadi.dto;

import java.io.Serializable;

import lombok.Builder;
import lombok.Getter;
import lombok.Setter;

@Setter
@Getter
@Builder
public class CariDataDiriDto implements Serializable {
    private String nik;
    private String nama_lengkap;
}
