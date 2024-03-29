<?php
$itemAuthour='ok';
ob_start();
?>

<div class="headerSection">
    <h2>Items Authors</h2>
    <span><span>Home</span> / Items Authors</span>
</div>
<div class="modalAddCatgory mt-3 mb-3">
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addCategory">Add New Item</button>
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h2>Add New Item</h2>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?=$_ENV['APP_URL']."/userItems"?>">
                    <input type="hidden" name="csrf_token" value="<?=$csrf_token?>" >
                    <input type="text" name="title" class="form-control mt-3" placeholder="Item Name">
                    <div class="mt-3">
                    <textarea type="text" name="content" rows="6" class="form-control mt-3 tiny" placeholder="Item Content"></textarea>

                    </div>

                    <select name="category" id="" class="form-control mt-3">
                      <option value="null" selected>choose category</option>
                      <?php
                      foreach($categorys as $category) {
                        ?>
                         <option value="<?=$category['categoryID']?>"><?=$category['nameC']?></option>
                        <?php
                      }
                      ?>
                    </select>

                    <div class="mt-3">
                      <span style="margin-left: 5px;">Choose Your Tags : </span><br><br>
                      <select class="form-control select2"  name="Tags[]" data-placeholder="Choose Your Tages" multiple>
                        <?php
                        foreach($tagsWikis as $tagWiki) {
                          ?>
                          <option value="<?=$tagWiki['tagID']?>"><?=$tagWiki['nameT']?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                    <input type="file" name='photo' class="form-control mt-3" accept=".jpg, .png, .jpeg">

                    <div class="button mt-3 mb-3 d-flex gap-2 justify-content-end">
                        <button type="submit" class="btn btn-outline-success">Add</button>
                        <button type="reset"  data-bs-dismiss="modal" class="btn btn-outline-dark">Close</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
<table class="mt-3 table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Items Name </th>
        <th>Tags</th>
        <th class='cataNameMobil'>Category Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id='tableBody'>
      <?php 
      if(!empty($items))
      for($i=0;$i<count($items);$i++){
        ?>
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img src="assets/uploads/<?=$items[$i]['urlImage']?>" alt=""  style="width: 45px; height: 45px" class="rounded-circle"/>
            <p class="fw-bold mb-1 ms-3"><?=$items[$i]['title']?></p>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">
            <?php 
            if(!empty($wikis[$i]))
            for($j=0;$j<count($wikis[$i]);$j++){
              echo "<span class='bg-dark text-white ps-1 px-1 pb-1 rounded-1'>#".$wikis[$i][$j]['nameT']."</span> ";
            }else echo "<span class='text-center fw-bold text-secondary'>No Tags</span>";
            ?>
          </p>
        </td>
        <td class='cataNameMobil'>
          <p class="fw-normal mb-1"><?=$items[$i]['nameC']?></p>
        </td>
        <td >
          <div class="d-flex gap-3">
            <svg onclick="deletItems(<?=$items[$i]['wikiID']?>,'<?=$items[$i]['urlImage']?>')" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="cursor-pointer bi bi-trash3 ml-2" viewBox="0 0 16 16">
              <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" data-bs-toggle="modal" data-bs-target="#updateItems<?=$items[$i]['wikiID']?>" width="25" height="25" fill="currentColor" class="cursor-pointer bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
            </svg>  
          </div>
          
          <div class="modal fade" id="updateItems<?=$items[$i]['wikiID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h2>Add New Item</h2>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?=$_ENV['APP_URL']."/updateItems"?>">
                      <input type="hidden" name="csrf_token" value="<?=$csrf_token?>" >
                      <input type="text" name="title" value="<?=$items[$i]['title']?>" class="form-control mt-3" placeholder="Item Name">

                      <textarea type="text"  name="content" class="form-control mt-3 tiny" rows="6" placeholder="Item Content"><?=$items[$i]['content']?></textarea>

                      <select name="category" id="" class="form-control mt-3">
                        <option value="null" disabled selected>choose category</option>
                        <?php
                        foreach($categorys as $category) {
                          ?>
                          <option value="<?=$category['categoryID']?>" <?php if($category['categoryID']==$items[$i]['categoryID']) echo 'selected'; ?>><?=$category['nameC']?></option>
                          <?php
                        }
                        ?>
                      </select>

                      <div class="mt-3">
                        <span style="margin-left: 5px;">Choose Your Tags : </span><br><br>
                        <select class="form-control select2"  name="Tags[]" data-placeholder="Choose Your Tages" multiple>
                        <?php
                        foreach($tagsWikis as $tagWiki) {
                          ?>
                          <option value="<?=$tagWiki['tagID']?>" 
                          <?php
                            for($j=0;$j<count($wikis[$i]);$j++){
                              if($wikis[$i][$j]['tagID']==$tagWiki['tagID']) echo "selected"; 
                            }
                            
                          ?>><?=$tagWiki['nameT']?></option>
                          <?php
                        }
                        ?>
                        </select>
                      </div>
                      <input type="hidden" name='urlimage' value='<?=$items[$i]['urlImage']?>'>
                      <input type="file" name='photo' class="form-control mt-3" accept=".jpg, .png, .jpeg">

                      <div class="button mt-3 mb-3 d-flex gap-2 justify-content-end">
                          <button type="submit" name="idWiki" value="<?=$items[$i]['wikiID']?>" class="btn btn-outline-success">Add</button>
                          <button type="reset"  data-bs-dismiss="modal" class="btn btn-outline-dark">Close</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <?php
      }
      else{
        echo "<tr><td class='text-center fw-bold text-secondary p-5 h3' colspan='4'>No Items</td></tr>";
      }
      ?>
    </tbody>
</table>
<?php
  if(isset($_SESSION["errorMessage"])) {
      echo "
      <script>
          document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '" . addslashes($_SESSION["errorMessage"]) . "',
              });
          });
      </script>";
  }
  if(isset( $_SESSION["succesAdd"])) {
    echo "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            title: 'saved!',
            text: 'Your Item has been saved.',
            icon: 'success',
            timer: 1500,
            showConfirmButton: false,
          });
        });
    </script>";
  }
?>
<script>
  function deletItems(id,urlImage){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
    if (result.isConfirmed) {
        var url = "/soutCrois/public/deletItemUser?id="+id+"&url="+urlImage;
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          Swal.fire({
            title: "Deleted!",
            text: "Your Item has been deleted.",
            icon: "success"
          });
          document.getElementById('tableBody').innerHTML=this.responseText;
        }
        xhttp.open("GET",url,true);
        xhttp.send();
    }
    });
}
</script>
<?php 
unset($_SESSION["errorMessage"]);
unset($_SESSION["succesAdd"]);
$content=ob_get_clean();
include "../views/admin/header.php";
?>
