<?php

class Formatador{
    
    /** Inverte os campos da data. Exemplo: DD/MM/AAAA -> AAAA/MM/DD.
     *
     * @param $data String 
     * @return string 
     */
    // public function inverteData($data){
    //     $temp = preg_split('/[\.\/-]/', $data, -1, PREG_SPLIT_NO_EMPTY);
        
    //     $result = $temp['2'] . '/' . $temp['1'] . '/' . $temp['0'];
        
    //     return $result;
    // }

    public function inverteData($data){
        if(count(explode("/",$data)) > 1){
            return implode("-",array_reverse(explode("/",$data)));
        }elseif(count(explode("-",$data)) > 1){
            return implode("/",array_reverse(explode("-",$data)));
        }
    }

    public function formataSomenteNumeros($str){
        
        $str = preg_replace( '/[^0-9]/is', '', $str );
        return $str;
    }
}
