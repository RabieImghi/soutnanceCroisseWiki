<?php
$tags="ok";
ob_start();
?>
<div class="headerSection">
    <h2>Tags</h2>
    <span><span>Home</span> / Tags</span>
</div>
<div class="modalAddCatgory mt-3 mb-3">
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addCategory">Add New Tag</button>
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h2>Add New Tag</h2>
            </div>
            <div class="modal-body">
                <form action="<?=$_ENV['APP_URL']."/TagsLists"?>" method="post">
                    <input type="text" class="form-control mt-3" name="Name" placeholder="Tag Name">
                    <textarea name="decription" id="" class="form-control  mt-3" rows="6"  placeholder="Tag Description"></textarea>
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
<table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Tag Names</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id='tablBody'>
      <?php 
      foreach($allTagss as $tag) {
        ?>
      <tr>
        <td>
          <p class="fw-normal mb-1"><?=$tag['nameT']?></p>
        </td>
        <td>
          <p class="fw-normal mb-1"><?=$tag['decription']?></p>
        </td>
        <td >
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="cursor-pointer bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
          </svg>
          <svg onclick="deletTags(<?=$tag['tagID']?>)" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="ml-2 cursor-pointer bi bi-trash3" viewBox="0 0 16 16">
            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
          </svg>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
</table>
<script>
  function deletTags(id){
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
        var xhttp= new XMLHttpRequest();
        var url = "/soutCrois/public/deletTags?id="+id;
        xhttp.onload = function() {
          document.getElementById('tablBody').innerHTML=this.responseText,
          Swal.fire({
            title: "Deleted!",
            text: "Your Item has been deleted.",
            icon: "success"
          });
        }
        xhttp.open("GET",url,true);
        xhttp.send();
      }
    });

    
  }
</script>
<?php 
$content=ob_get_clean();
include "../views/admin/header.php";
?>
