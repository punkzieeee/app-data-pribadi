package com.i2s.appdatapribadi.dto;

import java.io.Serializable;

import lombok.Builder;
import lombok.Getter;
import lombok.Setter;

@Setter
@Getter
@Builder
public class ResponseDto implements Serializable {
    private String code;
    private String message;
    private Object data;
}
