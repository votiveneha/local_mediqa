<?php
namespace App\Helpers;

class CustomHelper{
    public static function multipleFileUpload($file,$dtranaimg)
    {
        
        $dtran = array();
        
        if(!empty($file)){
            //print_r($file);
            foreach ($file as $dtrans) {
                //print_r($dtrans);
                $destinationPath = public_path() . '/uploads/education_degree';
                //echo $dtrans->getClientOriginalName();
                $dtrans->move($destinationPath,$dtrans->getClientOriginalName());
                $degree_transcript = $dtrans->getClientOriginalName();

                $dtran[] = $degree_transcript;

                
            }
        }
        
       
        if(!empty($dtran)){
            if(!empty($dtranaimg)){
                $new_tran_array = array_unique(array_merge($dtranaimg,$dtran));
            }else{
                $new_tran_array = array_unique($dtran);
            }
            
            $dtranimgs = json_encode($new_tran_array);
        }else{
            $dtranimgs = json_encode($dtranaimg);
        }

        return $dtranimgs;
    }
}