package com.punkzieeee.appdatapribadi.controller;


import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import com.punkzieeee.appdatapribadi.dto.CariDataDiriDto;
import com.punkzieeee.appdatapribadi.dto.DataDiriDto;
import com.punkzieeee.appdatapribadi.dto.ResponseDto;
import com.punkzieeee.appdatapribadi.entity.DataDiri;
import com.punkzieeee.appdatapribadi.service.interfaces.DataDiriService;

@RestController
@RequestMapping("api/v1")
public class DataDiriController {
    @Autowired
    DataDiriService dataDiriService;

    @GetMapping("/all")
    public ResponseEntity<ResponseDto> getAll() {
        try {
            ResponseDto res = ResponseDto.builder()
                    .code("200")
                    .data(dataDiriService.getAll())
                    .message("OK")
                    .build();

            return new ResponseEntity<ResponseDto>(res, HttpStatus.OK);
        } catch (Exception e) {
            ResponseDto res = ResponseDto.builder()
                    .code("502")
                    .data(e)
                    .message(e.getMessage())
                    .build();

            return new ResponseEntity<ResponseDto>(res, HttpStatus.BAD_GATEWAY);
        }
    }

    @GetMapping("/search")
    public ResponseEntity<ResponseDto> getSearch(@RequestBody CariDataDiriDto cariDataDiriDto) {
        try {
            ResponseDto res = ResponseDto.builder()
                    .code("200")
                    .data(dataDiriService.getSearch(cariDataDiriDto))
                    .message("OK")
                    .build();

                    System.out.println(res.toString());
            return new ResponseEntity<ResponseDto>(res, HttpStatus.OK);
        } catch (Exception e) {
            ResponseDto res = ResponseDto.builder()
                    .code("502")
                    .data(e)
                    .message(e.getMessage())
                    .build();

            return new ResponseEntity<ResponseDto>(res, HttpStatus.BAD_GATEWAY);
        }
    }

    @PostMapping("/save")
    public ResponseEntity<ResponseDto> saveData(@RequestBody DataDiriDto dataDiriDto) {
        try {
            DataDiri data = dataDiriService.saveData(dataDiriDto);
            if (data.equals(null)) {
                ResponseDto resp = ResponseDto.builder()
                        .code("502")
                        .data(null)
                        .message("Data Already Exist!")
                        .build();

                return new ResponseEntity<ResponseDto>(resp, HttpStatus.BAD_GATEWAY);
            }
            ResponseDto res = ResponseDto.builder()
                    .code("200")
                    .data(data)
                    .message("OK")
                    .build();

            return new ResponseEntity<ResponseDto>(res, HttpStatus.OK);
        } catch (Exception e) {
            ResponseDto res = ResponseDto.builder()
                    .code("502")
                    .data(e)
                    .message(e.getMessage())
                    .build();

            return new ResponseEntity<ResponseDto>(res, HttpStatus.BAD_GATEWAY);
        }
    }

    @PutMapping("/edit")
    public ResponseEntity<ResponseDto> updateData(@RequestBody DataDiriDto dataDiriDto, @RequestParam String uuid) {
        try {
            DataDiri data = dataDiriService.updateData(dataDiriDto, uuid);
            if (data.equals(null)) {
                ResponseDto resp = ResponseDto.builder()
                        .code("502")
                        .data(null)
                        .message("Data Already Exist!")
                        .build();

                return new ResponseEntity<ResponseDto>(resp, HttpStatus.BAD_GATEWAY);
            }
            ResponseDto res = ResponseDto.builder()
                    .code("200")
                    .data(data)
                    .message("OK")
                    .build();

            return new ResponseEntity<ResponseDto>(res, HttpStatus.OK);
        } catch (Exception e) {
            ResponseDto res = ResponseDto.builder()
                    .code("502")
                    .data(e)
                    .message(e.getMessage())
                    .build();

            return new ResponseEntity<ResponseDto>(res, HttpStatus.BAD_GATEWAY);
        }
    }

    @DeleteMapping("/delete")
    public ResponseEntity<ResponseDto> deleteData(@RequestBody DataDiriDto dataDiriDto) {
        try {
            dataDiriService.deleteData(dataDiriDto);
            ResponseDto res = ResponseDto.builder()
                    .code("200")
                    .data(null)
                    .message("OK")
                    .build();

            return new ResponseEntity<ResponseDto>(res, HttpStatus.OK);
        } catch (Exception e) {
            ResponseDto res = ResponseDto.builder()
                    .code("502")
                    .data(e)
                    .message(e.getMessage())
                    .build();

            return new ResponseEntity<ResponseDto>(res, HttpStatus.BAD_GATEWAY);
        }
    }
}
