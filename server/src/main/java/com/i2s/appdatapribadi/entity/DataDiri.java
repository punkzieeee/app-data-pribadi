package com.i2s.appdatapribadi.entity;

import java.util.Date;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Entity
@Table(name = "data_diri")
@Setter
@Getter
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class DataDiri {
    @Id
    @Column(nullable = false, unique = true)
    private String nik;
    @Column(nullable = false)
    private String namaLengkap;
    @Column(nullable = false)
    private String jenisKelamin;
    @Column(nullable = false)
    private Date tglLahir;
    @Column(nullable = false, columnDefinition = "TEXT")
    private String alamat;
    @Column(nullable = false)
    private String negara;
    @Column(nullable = false)
    private String uuid;
}
