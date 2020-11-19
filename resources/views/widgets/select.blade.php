@php
function showCategories($cats, $parent_id = 0, $char = '')
{
    foreach ($cats as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id)
        {
            echo '<option value="'.$item->cat_id.'">';
                echo $char . $item->name;
            echo '</option>';
             
            // Xóa chuyên mục đã lặp
            unset($cats[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($cats, $item->cat_id, $char.'|-----');
        }
    }
}
@endphp                                                
                                                <select name="cat" class="form-control border-input">
                                                	<option value="">-- Chọn danh mục --</option>
                                                    @php
                                                     showCategories($cats);
                                                    @endphp
                                                </select>
   