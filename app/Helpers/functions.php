<?php

function createTRee($data,$parent_id=0,$level=0){
    static $new_array=[];

    if(!$data){
       return;
    }
    foreach($data as $k=>$v) {
        if ($v->parent_id == $parent_id) {
            $v->level = $level;

            $new_array[] = $v;
            createTree($data, $v->cate_id, $level + 1);
        }
    }
    return $new_array;

}
 function uploads($img){
       $photo = request()->file($img);
       if(is_array($photo)){
        $result=[];
        foreach ($photo as $v) {
        if($v->isValid()){
            $result[]=$v->store('uploads');
        }
        }
        return $result;
       }else{
        if($photo->isValid()){
            $store_result = $photo->store('uploads');
            return $store_result;
        }
       }
       exit('未获取到上传文件或上传过程出错');
}


