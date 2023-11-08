<?php
$categori = new categori();
$name = $_POST['name'] ?? '';
$note = $_POST['note'] ?? '';
if (isset($_POST['addcategori'])) {
    $categori->add($name,$note);
    header('Location: index.php?act=categori&get=list');
}
?>
<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Thêm mới loại sản phẩm</h5>
        <div class="card">
            <div class="card-body">
                <form  methol="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">name</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                        <input type="text" name="note" class="form-control" id="exampleInputPassword1">
                    </div>
                 
                    <button type="submit" name="addcategori" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
