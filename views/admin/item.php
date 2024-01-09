<?php
$itemss='ok';
ob_start();
?>
<div class="headerSection">
    <h2>Items</h2>
    <span><span>Home</span> / Items</span>
</div>
<table class="mt-3 table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Items Name </th>
        <th>Items Content </th>
        <th>User Name</th>
        <th>Tags</th>
        <th>Category Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id='tableBody'>
      <?php 
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
          <p class="fw-normal mb-1"><?=$items[$i]['content']?></p>
        </td>
        <td>
          <p class="fw-normal mb-1 bg-blue-cs"><?=$items[$i]['username']?></p>
        </td>
        <td>
          <p class="fw-normal mb-1" style="color: #012970 !important;">
            <?php 
            for($j=0;$j<count($wikis[$i]);$j++){
              echo "#".$wikis[$i][$j]['nameT']." ";
            }
            ?>
          </p>
        </td>
        <td>
          <p class="fw-normal mb-1"><?=$items[$i]['nameC']?></p>
        </td>
        <td >
          <?php 
            if($items[$i]['deletedAt']==null){

            ?>
            <svg id="buttonArchive<?=$items[$i]['wikiID']?>" onclick="archiveItem(<?=$items[$i]['wikiID']?>)" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" style="fill: red;" class="bi bi-shield-x cursor-pointer" viewBox="0 0 16 16">
                <path d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56"/>
                <path d="M6.146 5.146a.5.5 0 0 1 .708 0L8 6.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 7l1.147 1.146a.5.5 0 0 1-.708.708L8 7.707 6.854 8.854a.5.5 0 1 1-.708-.708L7.293 7 6.146 5.854a.5.5 0 0 1 0-.708"/>
            </svg>
            <?php 
          }
          ?>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
</table>
<script>
  function archiveItem(id){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't  to Archive this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Archive it!"
    }).then((result) => {
    if (result.isConfirmed) {
        var url = "/soutCrois/public/archiveItem?id="+id;
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          Swal.fire({
            title: "Archived!",
            text: "Your Item has been archiver.",
            icon: "success"
          });
          document.getElementById('buttonArchive'+id).style.display="none";
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
