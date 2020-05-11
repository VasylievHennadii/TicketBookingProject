<?php 
// if(!empty($_POST)){

// }
if(!empty($_GET['category_id'])){
    $category_id = $_GET['category_id'];
    $category_info = sql_select("SELECT * FROM news WHERE category_id='". (int)$category_id ."'", 'row');
}
if($category_info['category_id']){
    if($category_info['meta_title']){
        $data['title'] = $category_info['meta_title'];
    } else {
        $data['title'] = $category_info['name'];
    }

    if($category_info['meta_description']){
        $data['description'] = $category_info['meta_description'];
    }
    $data['news'] = $category_info;

    getView('category', $data);
} else {
    getView('404');
}

?>