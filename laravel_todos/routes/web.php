<?php

Route::get('dangnhap', function () {
    return view('dangnhap');
});
Route::get('dangky', function () {
    return view('dangky');
});
Route::post('dangnhap', 'UserController@postDangNhap');
Route::post('dangky', 'UserController@postDangKy');

Route::get('index', 'TodosController@getTodos');

Route::get('dangxuat', 'TodosController@getDangXuat');

Route::get('ajax_add_todos/{strAdd}', 'TodosController@ajaxAddTodos');
Route::get('ajax_delete_todos/{id}', 'TodosController@ajaxDeleteTodos');
Route::get('ajax_edit_content_todos/{id}/{content}', 'TodosController@ajaxEditContentTodos');
Route::get('ajax_edit_check_todos/{id}', 'TodosController@ajaxEditCheckTodos');